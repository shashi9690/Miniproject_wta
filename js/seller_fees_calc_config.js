function _getBTcalcConfig() {
    var config= {
        "marketPlaces": [/* To add a new market. Add an object with required key, name (optional) & logo (optional). Also update the appropriate key value pairs under weights, categories, serviceTax, marketplacePaymentFee objects */
        {
            "key": "flipkart", "name": "Flipkart", "logo": "", "column": "1"
        }
        ,
        {
            "key": "snapdeal", "name": "Snapdeal", "logo": "", "column": "2"
        }
        ,
        {
            "key": "amazon", "name": "Amazon", "logo": "", "column": "3"
        }
        ,
        {
            "key": "paytm", "name": "Paytm", "logo": "", "column": "4"
        }
        ,
        {
            "key": "shopclues", "name": "Shopclues", "logo": "", "column": "5"
        }
        ,
        {
            "key": "ebay", "name": "&nbsp;&nbsp;&nbsp;Ebay", "logo": "", "column": "6"
        }
        ],
        "weights": {
            /* Add a new weight 'wX' section here with appropriate name & marketplace commissions under the shippingComm object (property name should match value of key property in marketplaces array) */
            "w1": {
                "name": "< 250gms | 20cm x 22cm x 3cm",
                "shippingComm": {
                    "flipkart": "55", "snapdeal": "50", "amazon": "40", "paytm": "45", "shopclues": "50", "ebay": "38"
                }
            }
            ,
            "w2": {
                "name": "< 500gms | 20cm x 22cm x 3cm",
                "shippingComm": {
                    "flipkart": "55", "snapdeal": "50", "amazon": "40", "paytm": "45", "shopclues": "50", "ebay": "47"
                }
            }
            ,
            "w3": {
                "name": "500gms | 30cm x 14cm x 5cm",
                "shippingComm": {
                    "flipkart": "55", "snapdeal": "50", "amazon": "40", "paytm": "45", "shopclues": "50", "ebay": "47"
                }
            }
            ,
            "w4": {
                "name": "1kg | 10cm x 10cm x 9.5cm",
                "shippingComm": {
                    "flipkart": "95", "snapdeal": "50", "amazon": "80", "paytm": "90", "shopclues": "90", "ebay": "94"
                }
            }
            ,
            "w5": {
                "name": "5kgs | 38.8cm x 34cm x 50.3cm",
                "shippingComm": {
                    "flipkart": "415", "snapdeal": "1050", "amazon": "400", "paytm": "450", "shopclues": "410", "ebay": "470"
                }
            }
            ,
            "w6": {
                "name": "8kgs | 41.8cm x 38.2cm x 65.2cm",
                "shippingComm": {
                    "flipkart": "655", "snapdeal": "1610", "amazon": "640", "paytm": "720", "shopclues": "650", "ebay": "752"
                }
            }
            ,
            "w7": {
                "name": "9kg | 45.40 cm x 31.43 cm x 7.62 cm",
                "shippingComm": {
                    "flipkart": "735", "snapdeal": "170", "amazon": "720", "paytm": "810", "shopclues": "730", "ebay": "846"
                }
            }
            ,
            "w8": {
                "name": "10kg | 40.16 cm x 32.86 cm x 25.88 cm",
                "shippingComm": {
                    "flipkart": "815", "snapdeal": "490", "amazon": "800", "paytm": "900", "shopclues": "810", "ebay": "940"
                }
            }
            ,
            "w9": {
                "name": "25kg | 54.8 cm x 42.1 cm x 33.5 cm",
                "shippingComm": {
                    "flipkart": "2015", "snapdeal": "1210", "amazon": "2000", "paytm": "2250", "shopclues": "2010", "ebay": "2350"
                }
            }
        }
        ,
        "categories": {
            /* Add a new category 'cX' section here with appropriate name & marketplace commission percetages under the marketComm object (property name should match value of key property in marketplaces array) */
            "c1": {
                "name": "Apparels & Accessories",
                "marketComm": {
                    "flipkart": "15", "snapdeal": "15", "amazon": "19.5", "paytm": "14", "shopclues": "15", "ebay": "7"
                }
            }
            ,
            "c2": {
                "name": "Jewellery",
                "marketComm": {
                    "flipkart": "25", "snapdeal": "14", "amazon": "23", "paytm": "7", "shopclues": "17", "ebay": "10"
                }
            }
            ,
            "c3": {
                "name": "Shoes",
                "marketComm": {
                    "flipkart": "13", "snapdeal": "10", "amazon": "13", "paytm": "12", "shopclues": "15", "ebay": "7"
                }
            }
            ,
            "c4": {
                "name": "Deodorants & Cosmetics",
                "marketComm": {
                    "flipkart": "7", "snapdeal": "7", "amazon": "14", "paytm": "7", "shopclues": "15", "ebay": "2"
                }
            }
            ,
            "c5": {
                "name": "Perfumes",
                "marketComm": {
                    "flipkart": "7", "snapdeal": "5", "amazon": "5", "paytm": "7", "shopclues": "15", "ebay": "7"
                }
            }
            ,
            "c6": {
                "name": "Home Furnishings and Furniture",
                "marketComm": {
                    "flipkart": "15", "snapdeal": "13", "amazon": "15", "paytm": "15", "shopclues": "10", "ebay": "7"
                }
            }
            ,
            "c7": {
                "name": "Health,Gourmet,Beverages",
                "marketComm": {
                    "flipkart": "7", "snapdeal": "9", "amazon": "7.5", "paytm": "11", "shopclues": "8", "ebay": "7"
                }
            }
            ,
            "c8": {
                "name": "Kitchen & Bar",
                "marketComm": {
                    "flipkart": "5", "snapdeal": "13", "amazon": "13.5", "paytm": "15", "shopclues": "8", "ebay": "7"
                }
            }
            ,
            "c9": {
                "name": "Home Appliances",
                "marketComm": {
                    "flipkart": "5", "snapdeal": "4", "amazon": "17", "paytm": "7", "shopclues": "4", "ebay": "5"
                }
            }
            ,
            "c10": {
                "name": "Personal Care",
                "marketComm": {
                    "flipkart": "7", "snapdeal": "8", "amazon": "7", "paytm": "3", "shopclues": "15", "ebay": "2"
                }
            }
            ,
            "c11": {
                "name": "Car & Bike Accessories",
                "marketComm": {
                    "flipkart": "15", "snapdeal": "20", "amazon": "5", "paytm": "7", "shopclues": "6", "ebay": "7"
                }
            }
            ,
            "c12": {
                "name": "Hand Towel & Power Tools",
                "marketComm": {
                    "flipkart": "7", "snapdeal": "16", "amazon": "15", "paytm": "15", "shopclues": "6", "ebay": "7"
                }
            }
            ,
            "c13": {
                "name": "Stationary",
                "marketComm": {
                    "flipkart": "11", "snapdeal": "5", "amazon": "9", "paytm": "7", "shopclues": "5", "ebay": "7"
                }
            }
            ,
            "c14": {
                "name": "Travel Gear & Luggage",
                "marketComm": {
                    "flipkart": "15", "snapdeal": "15", "amazon": "11", "paytm": "13", "shopclues": "15", "ebay": "7"
                }
            }
            ,
            "c15": {
                "name": "Memory Card, Pen Drive & Hard Disk",
                "marketComm": {
                    "flipkart": "7", "snapdeal": "7", "amazon": "17", "paytm": "3", "shopclues": "4", "ebay": "1"
                }
            }
            ,
            "c16": {
                "name": "Mobile & Accessories",
                "marketComm": {
                    "flipkart": "15", "snapdeal": "20", "amazon": "17", "paytm": "2", "shopclues": "10", "ebay": "5"
                }
            }
			 ,
            "c17": {
                "name": "Mobile & Accessories",
                "marketComm": {
                    "flipkart": "27", "snapdeal": "4.5", "amazon": "26", "paytm": "2", "shopclues": "10", "ebay": "5"
                }
            }
			,
            "c18": {
                "name": "PC components (RAM Motherboards)",
                "marketComm": {
                    "flipkart": "15", "snapdeal": "7", "amazon": "13", "paytm": "2", "shopclues": "12", "ebay": "5"
                }
            },
            "c19": {
                "name": "Pet Accessories",
                "marketComm": {
                    "flipkart": "14", "snapdeal": "9", "amazon": "14", "paytm": "2", "shopclues": "15", "ebay": "5"
                }
            }
			,
            "c20": {
                "name": "Personal Care",
                "marketComm": {
                    "flipkart": "", "snapdeal": "16.5", "amazon": "13", "paytm": "2", "shopclues": "15", "ebay": "5"
                }
            }
			,
            "c21": {
                "name": "Shoes",
                "marketComm": {
                    "flipkart": "", "snapdeal": "13", "amazon": "13", "paytm": "2", "shopclues": "15", "ebay": "5"
                }
            }
			,
            "c22": {
                "name": "Travel Gear & Luggage",
                "marketComm": {
                    "flipkart": "", "snapdeal": "21", "amazon": "16", "paytm": "2", "shopclues": "", "ebay": "5"
                }
            }
			,
            "c23": {
                "name": "Wallets",
                "marketComm": {
                    "flipkart": "14", "snapdeal": "9", "amazon": "16", "paytm": "2", "shopclues": "20", "ebay": "5"
                }
            }
			,
            "c24": {
                "name": "Watches",
                "marketComm": {
                    "flipkart": "14", "snapdeal": "9", "amazon": "17.5", "paytm": "2", "shopclues": "20", "ebay": "5"
                }
            }
        }
        ,
      
        "serviceTax": {
            /* Add service tax for a particular vendor (property name should match value of key property in marketplaces array) */
            "flipkart": "15", "snapdeal": "15", "amazon": "15", "paytm": "15", "shopclues": "15", "ebay": "15", "jabong": "15"
        }
        ,
        "marketplacePaymentFee": {
            /* Add market place payment fee for a particular vendor (property name should match value of key property in marketplaces array) */
            "flipkart": {
                "type": "slab",
                "variable": true,
                "grad": {
                    "sellingPrice": {
                        "below": {
                            "250": 0, "500": 5
                        }
                        ,
                        "above": {
                            "500": 10
                        }
                    }
                }
            }
            ,
            "snapdeal": {
                "type": "mixed",
                "variable": true,
                "grad": {
                    "minSlabComm": "20", "perComm": "3.2"
                }
            }
            ,
            "amazon": {
                "type": "slab", "variable": false, "val": 10
            }
            ,
            "paytm": {
                "type": "percent", "variable": false, "val": 3.03
            }
            ,
            "shopclues": {
                "type": "slab", "variable": false, "val": 0
            }
            ,
            "ebay": {
                "type": "percent", "variable": false, "val": 4.5
            }
        }
        ,
        "defaults": {
            /* Default value to be set */
            "mrp": "2000",
            "sellPrice": "1000",
            "GST": "5",
            "category": "c1",
            "weight": "w1",
            "tablerows": [/* Rows to be shown in the table. Setting the display property to 'false' will hide the associated row */
            {
                "id": "sellPrice", "name": "Selling Price", "display": true, "bold": true
            }
            ,
            {
                "id": "marketCommission", "name": "Marketplace Commission", "display": true, "mar_comm_meta": true, "neg": true
            }
            ,
            {
                "id": "serviceTaxOnCommission", "name": "Service Tax on Commission", "display": true, "neg": true
            }
            ,
            {
                "id": "marketPayFee", "name": "Marketplace Payment Fee", "display": true, "mar_pay_fee_meta": true, "neg": true
            }
            ,
            {
                "id": "serviceTaxOnMarketFee", "name": "Service Tax on Payment Fee", "display": true, "neg": true
            }
            ,
            {
                "id": "GST", "name": "GST", "display": true, "neg": true
            }
            ,
            {
                "id": "shippingCommission", "name": "Shipping (inclusive taxes)", "display": true, "neg": true
            }
            ,
            {
                "id": "netSlab", "name": "Net in Hand*", "display": true, "showRs": true, "class": "red"
            }
            ,
            {
                "id": "deductionPercent", "name": "Deductions", "display": true, "neg": true, "per": true
            }
            ,
            {
                "id": "gainPercent", "name": "Net In Hand%", "display": true, "per": true, "class": "red"
            }
            ]
        }
    } //end config
    return config;
}