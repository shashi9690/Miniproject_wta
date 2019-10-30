function _getBTcalcConfig() {
    var config= {
        "marketPlaces": [/* To add a new market. Add an object with required key, name (optional) & logo (optional). Also update the appropriate key value pairs under weights, categories, serviceTax, marketplacePaymentFee objects */

        {
            "key": "amazon", "name": "Amazon", "logo": "", "column": "1"
        }
		,
		{
            "key": "flipkart", "name": "Flipkart", "logo": "", "column": "2"
        }
        ,
		{
            "key": "snapdeal", "name": "Snapdeal", "logo": "", "column": "3"
        }
        ,
		{
            "key": "shopclues", "name": "Shopclues", "logo": "", "column": "4"
        }
        
        ],
        "weights":{
            /* Add a new weight 'wX' section here with appropriate name & marketplace commissions under the shippingComm object (property name should match value of key property in marketplaces array) */
            "w1": {
                "name": "250gms | 20cm x 22cm x 3cm",
                "shippingComm": {
                     "amazon": "40", "flipkart": "55", "snapdeal": "50","shopclues": "50"
                }
            }
            ,
            "w2": {
                "name": "500gms | 20cm x 22cm x 3cm",
                "shippingComm": {
                     "amazon": "40","flipkart": "55", "snapdeal": "50","shopclues": "50"
                }
            }
            ,
            "w3": {
                "name": "500gms | 30cm x 14cm x 5cm",
                "shippingComm": {
                    "amazon": "40","flipkart": "55", "snapdeal": "50","shopclues": "50"
                }
            }
            ,
            "w4": {
                "name": "1kg | 10cm x 10cm x 9.5cm",
                "shippingComm": {
                    "amazon": "80","flipkart": "95", "snapdeal": "50",  "shopclues": "90"
                }
            }
            ,
            "w5": {
                "name": "5kgs | 38.8cm x 34cm x 50.3cm",
                "shippingComm": {
                    "amazon": "400","flipkart": "415", "snapdeal": "1050", "shopclues": "410"
                }
            }
            ,
            "w6": {
                "name": "8kgs | 41.8cm x 38.2cm x 65.2cm",
                "shippingComm": {
                    "amazon": "640","flipkart": "655", "snapdeal": "1610","shopclues": "650"
                }
            }
            ,
            "w7": {
                "name": "9kg | 45.40 cm x 31.43 cm x 7.62 cm",
                "shippingComm": {
                   "amazon": "720", "flipkart": "735", "snapdeal": "170", "shopclues": "730"
                }
            }
            ,
            "w8": {
                "name": "10kg | 40.16 cm x 32.86 cm x 25.88 cm",
                "shippingComm": {
                   "amazon": "800","flipkart": "815", "snapdeal": "490", "shopclues": "810"
                }
            }
            ,
            "w9": {
                "name": "25kg | 54.8 cm x 42.1 cm x 33.5 cm",
                "shippingComm": {
                    "amazon": "2000","flipkart": "2015", "snapdeal": "1210", "shopclues": "2010"
                }
            }
        },
        "categories": {
            /* Add a new category 'cX' section here with appropriate name & marketplace commission percetages under the marketComm object (property name should match value of key property in marketplaces array) */
            "c1": {
                "name": "Apparels & Accessories",
                "marketComm": {
                    "amazon": "19.5","flipkart": "17", "snapdeal": "21",  "shopclues": "15"
                }
            }
            ,
            "c2": {
                "name": "Baby Products",
                "marketComm": {
                    "amazon": "6","flipkart": "6", "snapdeal": "4.5",  "shopclues": "15"
                }
            }
            ,
            "c3": {
                "name": "Bean Bags and Inflatables",
                "marketComm": {
                    "amazon": "11","flipkart": "5", "snapdeal": "17.5",  "shopclues": "6"
                }
            }
            ,
            "c4": {
                "name": "Cables - Electronics, PC, Wireless",
                "marketComm": {
                    "amazon": "24","flipkart": "3", "snapdeal": "4.5", "shopclues": "8"
                }
            }
            ,
            "c5": {
                "name": "Camera",
                "marketComm": {
                    "amazon": "6", "flipkart": "3", "snapdeal": "6",  "shopclues": "10"
                }
            }
            ,
            "c6": {
                "name": "Car & Bike Accessories",
                "marketComm": {
                    "amazon": "10","flipkart": "20", "snapdeal": "17.5",  "shopclues": "12"
                }
            }
            ,
            "c7": {
                "name": "Deodorants & Cosmetics",
                "marketComm": {
                    "amazon": "14","flipkart": "5", "snapdeal": "9",   "shopclues": "11"
                }
            }
            ,
            "c8": {
                "name": "Fashion Jewellery",
                "marketComm": {
                    "amazon": "23","flipkart": "4", "snapdeal": "20",   "shopclues": "17"
                }
            }
            ,
            "c9": {
                "name": "Headsets, Headphones and Earphones",
                "marketComm": {
                    "amazon": "17","flipkart": "30", "snapdeal": "4.5",  "shopclues": "8"
                }
            }
            ,
            "c10": {
                "name": "Home Appliances",
                "marketComm": {
                     "amazon": "17","flipkart": "10", "snapdeal": "17.5",  "shopclues": "13"
                }
            }
            ,
            "c11": {
                "name": "Home Furnishings and Furniture",
                "marketComm": {
                    "amazon": "7.5", "flipkart": "15", "snapdeal": "13",  "shopclues": "15"
                }
            }
            ,
            "c12": {
                "name": "Health & Personal Care",
                "marketComm": {
                     "amazon": "13.5","flipkart": "6", "snapdeal": "5",  "shopclues": "15"
                }
            }
            ,
            "c13": {
                "name": "Kitchen - Appliances",
                "marketComm": {
                    "amazon": "5","flipkart": "5", "snapdeal": "11.5",   "shopclues": "15"
                }
            }
            ,
            "c14": {
                "name": "Laptops",
                "marketComm": {
                    "amazon": "12","flipkart": "15", "snapdeal": "4.5",   "shopclues": "15"
                }
            }
            ,
            "c15": {
                "name": "Memory Card, Pen Drive & Hard Disk",
                "marketComm": {
                    "amazon": "5","flipkart": "10", "snapdeal": "6",  "shopclues": "6"
                }
            }
            ,
            "c16": {
                "name": "Mobile Phones and Tablets",
                "marketComm": {
                    "amazon": "7","flipkart": "3", "snapdeal": "19",   "shopclues": "10"
                }
            }
			 ,
            "c17": {
                "name": "Mobile & Accessories",
                "marketComm": {
                    "amazon": "26","flipkart": "27", "snapdeal": "4.5",  "shopclues": "10"
                }
            }
			,
            "c18": {
                "name": "PC components (RAM Motherboards)",
                "marketComm": {
                    "amazon": "13", "flipkart": "15", "snapdeal": "7",  "shopclues": "12"
                }
            },
            "c19": {
                "name": "Pet Accessories",
                "marketComm": {
                    "amazon": "14","flipkart": "14", "snapdeal": "9",  "shopclues": "15"
                }
            }
			,
            "c20": {
                "name": "Personal Care",
                "marketComm": {
                    "amazon": "13","flipkart": "10", "snapdeal": "16.5",  "shopclues": "15"
                }
            }
			,
            "c21": {
                "name": "Shoes",
                "marketComm": {
                    "amazon": "13","flipkart": "12", "snapdeal": "13",  "shopclues": "15"
                }
            }
			,
            "c22": {
                "name": "Travel Gear & Luggage",
                "marketComm": {
                    "amazon": "16","flipkart": "14", "snapdeal": "21",  "shopclues": "18"
                }
            }
			,
            "c23": {
                "name": "Wallets",
                "marketComm": {
                   "amazon": "16", "flipkart": "14", "snapdeal": "9",  "shopclues": "20"
                }
            }
			,
            "c24": {
                "name": "Watches",
                "marketComm": {
                   "amazon": "17.5", "flipkart": "14", "snapdeal": "9",   "shopclues": "20"
                }
            }
	},
        
        "serviceTax": {
            /* Add service tax for a particular vendor (property name should match value of key property in marketplaces array) */
           "amazon": "18", "flipkart": "18", "snapdeal": "18",  "shopclues": "18"        }
        ,
        "marketplacePaymentFee": {
            /* Add market place payment fee for a particular vendor (property name should match value of key property in marketplaces array) */
            
            "flipkart": {
                    "type": "slab",
                    "variable": true,
                    "grad": {
                        "sellingPrice": {
                            "below": {
                                "250": 0,
                                "500": 5
                            },
                            "above": {
                                "500": 10
                            }
                        }
                    }
                },
                "snapdeal": {
                    "type": "mixed",
                    "variable": true,
                    "grad": {
                        "minSlabComm": "20",
                        "perComm": "3.2"
                    }
                },
                "amazon": {
                    "type": "slab",
                    "variable": false,
                    "val": 10
                },
             
                "shopclues": {
                    "type": "slab",
                    "variable": false,
                    "val": 0
                }
             
            },
        "defaults": {
            /* Default value to be set */
            "mrp": "2000",
            "sellPrice": "1000",
            "GST": "18",
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
                "id": "serviceTaxOnCommission", "name": "GST on Commission", "display": true, "neg": true
            }
            ,
            {
                "id": "marketPayFee", "name": "Marketplace Payment Fee", "display": true, "mar_pay_fee_meta": true, "neg": true
            }
            ,
            {
                "id": "serviceTaxOnMarketFee", "name": "GST on Payment Fee", "display": true, "neg": true
            }
            ,
            {
                "id": "GST", "name": "GST On Product", "display": true, "neg": true
            }
            ,
            {
                "id": "shippingCommission", "name": "Shipping (Approx)", "display": true, "neg": true
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