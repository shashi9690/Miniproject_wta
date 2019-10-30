jQuery(document).ready(function($) {

    var _loader = $(".loader");
    // _loader.css("display", "block");
    // _loader.fadeOut(1000);
    var bsExample = $(".bs-example");

    bsExample.animate({
        opacity: 1,
    }, 4000, function() {
        // Animation complete.
    });

    function sellerCalcConstructor() {
        console.log('sellerCalc constructor init')
    }

    var sellerCalc = new sellerCalcConstructor();
    sellerCalc.config = _getBTcalcConfig();
    console.log("config json:", sellerCalc.config);

    var _categories = sellerCalc.config.categories;
    var _weights = sellerCalc.config.weights;
    var _serTax = sellerCalc.config.serviceTax;
    var _marketPlacePayFee = sellerCalc.config.marketplacePaymentFee;
    var _marketPlaces = sellerCalc.config.marketPlaces;

    // var _marketPlaceKeys = Object.keys(_marketPlaces);
    var _tableRows = sellerCalc.config.defaults.tablerows;

    var _calculateView = $("#calculateView");
    var _desc = $(".desc");
    var _mrpHandle = $("#marketprice");
    var _spHandle = $("#sprice");
    var _GSTHandle = $("#GST-input");
    var _selCategory = $("#category");
    var _selWeight = $("#shipping");
    var _dscntHandle = $(".difference");

    function _appendOptions(selector, ref) {
        var optionString = '';
        for (var i in ref) {
            optionString += "<option value='" + i + "'>" + ref[i].name + "</option>";
        }
        $(selector).append(optionString);
    }
    sellerCalc._appendOptions = _appendOptions;

    var _tableBody = null;

    function _startCalc(mrp, sp, GST, category, weight) {
        console.log("start calc");
        sp = Number(sp);
        // sellerCalc._showSpAlert()
        var rowVals = {};

        for (var iz in _marketPlaces) {
            var mkt = _marketPlaces[iz];
            for (var iy in mkt) {
                if (iy !== "logo" && iy !== "key" && iy !== "name") {
                    mkt[iy] = '';
                }
            }
        }

        for (var iz in _tableRows) {
            var obj = _tableRows[iz];
            switch (obj.id) {
                case "sellPrice":
                    {
                        var mk = _addRowVals(sp, obj.id);
                        sellerCalc._appendRow(obj, mk);
                    };
                    break;
                case "marketCommission":
                    {
                        var catRef = null
                        for (var z in _categories) {
                            if (z === category) {
                                catRef = _categories[z];
                                break;
                            }
                        }

                        rowVals = {};
                        for (var z in _marketPlaces) {
                            for (var y in catRef.marketComm) {
                                if (_marketPlaces[z].key === y) {
                                    var mpc = Math.round(Number(catRef.marketComm[y]) / 100 * sp);
                                    _marketPlaces[z][obj.id] = mpc
                                    _marketPlaces[z]["mar_comm_meta"] = " (" + catRef.marketComm[y] + "%)";
                                    rowVals[z] = {
                                        key: y,
                                        val: mpc
                                    }
                                    break;
                                }
                            }
                        }
                        // console.log("rowVals",rowVals);
                        // console.log("_marketPlaces:", _marketPlaces);

                        sellerCalc._appendRow(obj, rowVals);
                    };
                    break;
                case "serviceTaxOnCommission":
                    {
                        rowVals = {};
                        for (var z in _marketPlaces) {
                            for (var y in _serTax) {
                                if (_marketPlaces[z].key === y) {
                                    var stc = Math.round(Number(_serTax[y]) / 100 * _marketPlaces[z].marketCommission);
                                    _marketPlaces[z][obj.id] = stc;
                                    rowVals[z] = {
                                        key: y,
                                        val: stc
                                    }
                                    break;
                                }
                            }
                        }
                        sellerCalc._appendRow(obj, rowVals);
                    };
                    break;
                case "marketPayFee":
                    {
                        rowVals = {};

                        for (var z in _marketPlaces) {
                            var mrpf = 0;
                            for (var y in _marketPlacePayFee) {
                                if (_marketPlaces[z].key === y) {
                                    var mrCommRef = _marketPlacePayFee[y];
                                    if (mrCommRef.variable) {
                                        var gradSpRef = mrCommRef.grad.sellingPrice;
                                        if (mrCommRef.type === "slab") {

                                            if (gradSpRef) { //flipkart case
                                                for (var j in gradSpRef.below) {
                                                    var num = Number(j);
                                                    if (sp < num) {
                                                        console.log("below:", j)
                                                        mrpf = gradSpRef.below[j]
                                                        break;
                                                    }
                                                }

                                                for (var j in gradSpRef.above) {
                                                    var num = Number(j);
                                                    if (sp >= num) {
                                                        console.log("above", j)
                                                        mrpf = gradSpRef.above[j]
                                                        break;
                                                    }
                                                }
                                            }
                                            // else{ //snapdeal case
                                            //     console.log("snapdeal case")
                                            //     mrpf = Math.round( Number( mrCommRef.grad.perComm ) / 100 * sp );
                                            //     var minSlabComm = Number( mrCommRef.grad.minSlabComm );
                                            //     if(mrpf < minSlabComm){
                                            //         mrpf = minSlabComm;
                                            //     }
                                            // }

                                        } else if (mrCommRef.type === "mixed") {
                                            if (gradSpRef) {

                                            } else { //snapdeal case
                                                console.log("snapdeal case")
                                                mrpf = Math.round(Number(mrCommRef.grad.perComm) / 100 * sp);
                                                var minSlabComm = Number(mrCommRef.grad.minSlabComm);
                                                if (mrpf < minSlabComm) {
                                                    mrpf = minSlabComm;
                                                } else {
                                                    _marketPlaces[z]["mar_pay_fee_meta"] = " (" + mrCommRef.grad.perComm + "%)";
                                                }
                                            }
                                        } else {
                                            console.warn("unhandled type for market payment fee:", mrCommRef.type)
                                        }
                                    } else {
                                        if (mrCommRef.type === "slab") {
                                            mrpf = Number(mrCommRef.val);
                                            // _marketPlaces[z][obj.key] = mrpf;
                                        } else {
                                            mrpf = Math.round(Number(mrCommRef.val) / 100 * sp);
                                            _marketPlaces[z]["mar_pay_fee_meta"] = " (" + mrCommRef.val + "%)";
                                            // _marketPlaces[z][obj.key] = mrpf;
                                        }
                                    }

                                    _marketPlaces[z][obj.id] = mrpf;
                                    rowVals[z] = {
                                        key: y,
                                        val: mrpf
                                    }
                                    break;

                                }
                            }
                        } //end for

                        sellerCalc._appendRow(obj, rowVals);
                    };
                    break;
                case "serviceTaxOnMarketFee":
                    {
                        rowVals = {}
                        for (var z in _marketPlaces) {
                            var sTax = 0;
                            for (var y in _serTax) {
                                if (_marketPlaces[z].key === y) {
                                    sTax = Math.round(Number(_serTax[y]) / 100 * Number(_marketPlaces[z]["marketPayFee"]))
                                    _marketPlaces[z][obj.id] = sTax;
                                    rowVals[z] = {
                                        key: y,
                                        val: sTax
                                    }
                                    break;
                                }
                            }
                        }

                        sellerCalc._appendRow(obj, rowVals);
                    };
                    break;
                case "GST":
                    {
                        var GST = sp - Math.round((sp / (1 + GST / 100)));
                        var mk = _addRowVals(GST, obj.id);
                        sellerCalc._appendRow(obj, mk);
                    };
                    break;
                case "shippingCommission":
                    {
                        var wgtRef = null
                        for (var z in _weights) {
                            if (z === weight) {
                                wgtRef = _weights[z];
                                break;
                            }
                        }

                        rowVals = {};
                        for (var z in _marketPlaces) {
                            for (var y in wgtRef.shippingComm) {
                                if (_marketPlaces[z].key === y) {
                                    var ship = Math.round(Number(wgtRef.shippingComm[y]));
                                    _marketPlaces[z][obj.id] = ship;
                                    rowVals[z] = {
                                        key: y,
                                        val: ship
                                    }
                                    break;
                                }
                            }
                        }
                        sellerCalc._appendRow(obj, rowVals);
                    };
                    break;
                case "netSlab":
                    {
                        rowVals = {}
                        for (var z in _marketPlaces) {
                            var netSlab = 0;
                            netSlab = Math.round(_marketPlaces[z]["sellPrice"] -
                                (_marketPlaces[z]["marketCommission"] + _marketPlaces[z]["serviceTaxOnCommission"] + _marketPlaces[z]["serviceTaxOnMarketFee"] + _marketPlaces[z]["marketPayFee"] + _marketPlaces[z]["GST"] + _marketPlaces[z]["shippingCommission"]))

                            _marketPlaces[z][obj.id] = netSlab;
                            rowVals[z] = {
                                key: y,
                                val: netSlab
                            }
                        }
                        sellerCalc._appendRow(obj, rowVals);
                    };
                    break;
                case "deductionPercent":
                    {
                        rowVals = {}
                        for (var z in _marketPlaces) {
                            var dedPer = 0;
                            dedPer = Math.round((1 - (_marketPlaces[z]["netSlab"] / _marketPlaces[z]["sellPrice"])) * 100);

                            _marketPlaces[z][obj.id] = dedPer;

                            rowVals[z] = {
                                key: y,
                                val: dedPer
                            }
                        }
                        sellerCalc._appendRow(obj, rowVals);
                    };
                    break;
                case "gainPercent":
                    {
                        rowVals = {}
                        for (var z in _marketPlaces) {
                            var gainPer = 0;
                            gainPer = Math.round((_marketPlaces[z]["netSlab"] / _marketPlaces[z]["sellPrice"] * 100));

                            _marketPlaces[z][obj.id] = gainPer;

                            rowVals[z] = {
                                key: y,
                                val: gainPer
                            }
                        }
                        sellerCalc._appendRow(obj, rowVals);
                    };
                    break;
                default:
                    console.warn(obj.id + " case not handled");
            } //end switch
        }
        console.log("_marketPlaces:", _marketPlaces);
    } //end _startCalc

    function _calcFees() {
        console.log('cal start')
        _mrpHandle.removeClass("borderClass");
        _spHandle.removeClass("borderClass");
        _GSTHandle.removeClass("borderClass");
        _selCategory.removeClass("borderClass");
        _selWeight.removeClass("borderClass");

        var mrp = _mrpHandle.val(),
            sp = _spHandle.val(),
            GST = _GSTHandle.val()
        category = $("#category option:selected").val(),
            weight = $("#shipping option:selected").val();
        console.log("mrp: " + mrp + " sp: " + sp + " GST: " + GST + " category: " + category + " weight: " + weight)
        if (mrp && sp && GST && category && weight) {

            _loader.css("display", "block");
            _loader.fadeOut(2000);

            sellerCalc._setRowValues();
            setTimeout(
                _startCalc,
                500,
                mrp, sp, GST, category, weight
            );
        } // end if
        else {
            if (!mrp) {
                _mrpHandle.addClass("borderClass");
            }

            if (!sp) {
                _spHandle.addClass("borderClass");
            }

            if (!GST) {
                _GSTHandle.addClass("borderClass");
            }

            if (!category) {
                _selCategory.addClass("borderClass");
            }

            if (!weight) {
                _selWeight.addClass("borderClass");
            }
        } //end if else
    } //end _calcFees
    sellerCalc._calcFees = _calcFees;

    sellerCalc._showSpAlert = function() {
        var mrp = Number(_mrpHandle.val());
        var sp = Number(_spHandle.val());
        if (mrp < sp) {
            alert("Selling price cannot be greater than MRP!")
            _spHandle.val(mrp)
        }
        return true
    }

    sellerCalc._calcDiscount = function() {
        var mrp = Number(_mrpHandle.val());
        var sp = Number(_spHandle.val());
        var dscnt = "na";
        if (mrp && sp && mrp > sp) {
            var dscnt = (1 - sp / mrp) * 100;
            dscnt = dscnt.toFixed(1)
            dscnt += "% Discount"
        } else {
            sellerCalc._showSpAlert()
        }
        _dscntHandle.text(dscnt)
    }

    function _appendRow(row, markets) {
        if (!row.display) return;

        var tbRow = null;
        if (row.handle) {
            tbRow = row.handle;
            tbRow.empty();
        } else {
            tbRow = $("<tr></tr>").attr("id", row.id).addClass("value");
            if (row.bold) {
                tbRow.css("font-weight", "700");
            }
        }
        tbRow.append("<th scope='row'></th>");
        var td1 = $("<td></td>")
        td1.attr("align", "left")
        td1.text(row.name)

        if (row.class) {
            td1.addClass(row.class);
        }

        tbRow.append(td1)

        // console.log(row.key,markets);

        for (var x in _marketPlaces) {
            if (typeof _marketPlaces[x] === "object") {
                var td = $("<td></td>");
                td.addClass("alignleft");

                var textVal = 'na';
                if (markets[x]) {
                    if (markets[x].val === '-') {
                        textVal = '-';
                    } else {
                        if (isNaN(markets[x].val)) {
                            // do nothing
                        } else {

                            if (row.neg && markets[x].val) {
                                textVal = "-" + markets[x].val
                            } else {
                                textVal = markets[x].val
                            }

                            if (row.showRs) {
                                textVal = "&#8377; " + textVal;
                            }

                            if (row.mar_comm_meta && _marketPlaces[x].mar_comm_meta) {
                                // console.log("showMEta",row.mar_comm_meta)
                                textVal += _marketPlaces[x].mar_comm_meta;
                            }

                            if (row.mar_pay_fee_meta && _marketPlaces[x].mar_pay_fee_meta) {
                                textVal += _marketPlaces[x].mar_pay_fee_meta;
                            }

                            if (row.per) {
                                textVal = textVal + "%";
                            }
                        } //end if else
                    } //end if else
                }

                td.html(textVal);

                if (row.class) {
                    td.addClass(row.class)
                }
                tbRow.append(td)

                // td = $("<td></td>");
                // tbRow.append(td);
            }
        }
        return tbRow;
    } //end _appendRow
    sellerCalc._appendRow = _appendRow;

    function _getHandles() {
        for (var x in _tableRows) {
            _tableRows[x].handle = $("#" + _tableRows[x].id);
        }
        console.log("table roes with handles:", _tableRows)
    }

    function _createTable() {
        var table = $("<table></table>").addClass("table table-condensed"),
            tableHeader = $("<thead></thead>"),
            tbRow = $("<tr></tr>").addClass("imgclass");

        tbRow.append("<th></th><th class='logos'></th>");

        for (var x in _marketPlaces) {
            if (typeof _marketPlaces[x] === "object") {
                var th = $("<th></th>");
                th.addClass("imgsection");
                var img = $("<img/>");
                img.attr("src", _marketPlaces[x].logo);
                img.css("margin-right", "12px");
                img.css("float", "left");
                th.append(img);
                var label = $("<label></label>");
                label.html(_marketPlaces[x].name);
                label.css("text-align", "left");
                th.append(label);
                tbRow.append(th);
            }
        }

        tableHeader.append(tbRow);
        table.append(tableHeader);

        _tableBody = $("<tbody></body>");

        sellerCalc._setRowValues(true);

        table.append(_tableBody);
        bsExample.append(table);
        console.log(bsExample);
        _getHandles();
        _desc.css("display", "block");
    } //end _createTable
    sellerCalc._createTable = _createTable;

    function _setRowValues(append) {
        for (var z in _tableRows) {
            var rowItem = _tableRows[z];
            if (typeof rowItem === "object") {
                var mk = _addRowVals();
                // rowItem.id = rowItem.key;
                var row = sellerCalc._appendRow(rowItem, mk);
                if (append) {
                    _tableBody.append(row);
                }
            }
        }
    }
    sellerCalc._setRowValues = _setRowValues;

    function _addRowVals(val, key) {
        mrkts = {}
        for (var x in _marketPlaces) {
            if (key) {
                _marketPlaces[x][key] = val;
            }
            mrkts[x] = {
                key: _marketPlaces[x].key,
                val: val ? val : '-'
            }
        }
        // console.log("mrkts:",mrkts);
        return mrkts
    }

    function _setDefaults() {
        _mrpHandle.val(Number(sellerCalc.config.defaults.mrp));
        _spHandle.val(Number(sellerCalc.config.defaults.sellPrice));
        _GSTHandle.val(Number(sellerCalc.config.defaults.GST));
        _selCategory.val(sellerCalc.config.defaults.category);
        _selWeight.val(sellerCalc.config.defaults.weight);
        sellerCalc._calcDiscount()
        setTimeout(
            sellerCalc._calcFees, 1000);
    }
    sellerCalc._setDefaults = _setDefaults;

    sellerCalc._appendOptions("#category", _categories);
    sellerCalc._appendOptions("#shipping", _weights);

    _mrpHandle.on("input", sellerCalc._calcDiscount);
    _spHandle.on("input", sellerCalc._calcDiscount);
    $("#calculate").click(sellerCalc._calcFees);

    _calculateView.css("display", "block");
    sellerCalc._createTable();
    sellerCalc._setDefaults();

});