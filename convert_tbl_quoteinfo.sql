#Alter the table to have the necessary fields
alter table sft_quotes
#add columns
add column customer_id int after id,
add column quantity_minimum varchar(191) after `method`,
add column quantity_maximum varchar(191) after quantity_minimum,
add column baking_time_pre varchar(191),
add column baking_temp_pre varchar(191),
add column baking_time_post varchar(191),
add column baking_temp_post varchar(191),
add column bake_notes varchar(191),
add column blast_notes varchar(191),
add column mask_notes varchar(191),
add column testing tinyint(4),
add column testing_notes varchar(191),
add column contact_id int after customername,
add column user_id int,
add column process_id int,
add column updated_at timestamp,
add column deleted_at timestamp,
add column archive tinyint(4),
add column revision int(20),
add column print varchar(191),

#Change column names
change column `timestamp` created_at timestamp default current_timestamp,
change column price1 price decimal(15,2),
change column quantityunits units varchar(191),
change column quantity2 quantity_price_break int(11),
change column price2 price_break decimal(15,2),
change column minlot minimum_lot_charge decimal(15,2),
change column surfacearea surface_area varchar(30),
change column minthickness thickness_minimum varchar(10),
change column maxthickness thickness_maximum varchar(10),

#drop columns
drop filename, drop filetype, drop filesize, drop filecontent, contact;

#Convert mask to masking
update sft_quotes
set mask = 1
where mask = "mask";

#Convert bake to tinyint
update sft_quotes
set blast = 1
where blast = "blast";

#Convert blast to tinyint
update sft_quotes
set blast = 1
where blast = "blast";

#Rename mask to masking, blast to blasting
alter table sft_quotes
change column mask masking tinyint(4),
change column blast blasting tinyint(4),
change column bake baking tinyint(4);

#Populate quantity_minimum from quantity1
update sft_quotes
set quantity_minimum = SUBSTRING_INDEX(quantity1, ' ', 1) 
where quantity_minimum is null;

update sft_quotes
set quantity_minimum = quantity1
where quantity_minimum is null;

#Populate quantity_maximum from quantity1
update sft_quotes
set quantity_maximum = SUBSTRING_INDEX(quantity1, ' TO ', -1)
where quantity_maximum is null;

#Convert customer name to customer_id
update sft_quotes
set customer_id = (select MIN(id) from sft_customers where sft_customers.name = sft_quotes.customername);

#Fix customer name mismatches
update sft_quotes
set customer_id = 121 where sft_quotes.customername = "Crowley Fab. & Machining";
update sft_quotes
set customer_id = 121 where sft_quotes.customername = "Crowley Fab, & Machining";
update sft_quotes
set customer_id = 1043 where sft_quotes.customername = "Applied Technology Manufacturing Corp.";
update sft_quotes
set customer_id = 315 where sft_quotes.customername = "RSJ Technologies, dba R&T Tech., Inc.";
update sft_quotes
set customer_id = 315 where sft_quotes.customername = "R&T Technologies, Inc. dba Glenview";
update sft_quotes
set customer_id = 183 where sft_quotes.customername = "EMT";
update sft_quotes
set customer_id = 183 where sft_quotes.customername = "Endicott Machine & Tool";
update sft_quotes
set customer_id = 1014 where sft_quotes.customername = "CMT (Computerized Manufacturing Tech)";
update sft_quotes
set customer_id = 764 where sft_quotes.customername = "Camco Manufacturing, Inc.";
update sft_quotes
set customer_id = 535 where sft_quotes.customername = "Progressive Tool Co., Inc.";
update sft_quotes
set customer_id = 1200 where sft_quotes.customername = "Square Deal Machining";
update sft_quotes
set customer_id = 1169 where sft_quotes.customername = "Dura-Bilt Precision Fabricating";
update sft_quotes
set customer_id = 1190 where sft_quotes.customername = "TJ Powdercoaters";
update sft_quotes
set customer_id = 1131 where sft_quotes.customername = "Dewey Machine & Tool, Inc";
update sft_quotes
set customer_id = 350 where sft_quotes.customername = "Holdrens Precision Machining";
update sft_quotes
set customer_id = 1110 where sft_quotes.customername = "Precision Systems Manufacturing, Inc";
update sft_quotes
set customer_id = 631 where sft_quotes.customername = "Tioga Tool";
update sft_quotes
set customer_id = 45 where sft_quotes.customername = "Bennett Die&Tool,Co.,Inc.";
update sft_quotes
set customer_id = 620 where sft_quotes.customername = "Taylor Precision Machining, Inc.";
update sft_quotes
set customer_id = 1095 where sft_quotes.customername = "Raymond Corporation";
update sft_quotes
set customer_id = 1189 where sft_quotes.customername = "PB Industries";
update sft_quotes
set customer_id = 1159 where sft_quotes.customername = "Darco Manufacturing, Inc";
update sft_quotes
set customer_id = 1231 where sft_quotes.customername = "3D Systems Corporation";
update sft_quotes
set customer_id = 1231 where sft_quotes.customername = "Quickparts / QuickCut";
update sft_quotes
set customer_id = 580 where sft_quotes.customername = "SEPAC,  INC.";
update sft_quotes
set customer_id = 1350 where sft_quotes.customername = "Swissomation";
update sft_quotes
set customer_id = 1350 where sft_quotes.customername = "Aavera Engineering";
update sft_quotes
set customer_id = 1069 where sft_quotes.customername = "ACRO-FAB LTD";
update sft_quotes
set customer_id = 1194 where sft_quotes.customername = "Advantech Industries Inc.";
update sft_quotes
set customer_id = 1378 where sft_quotes.customername = "Allied Motion Watertown (Stature Electri";
update sft_quotes
set customer_id = 1167 where sft_quotes.customername = "Arnprior Rapid Manufacturing Solutions";
update sft_quotes
set customer_id = 1167 where sft_quotes.customername = "Arnprior - RMSI";
update sft_quotes
set customer_id = 1165 where sft_quotes.customername = "Auglaize Erie Machine";
update sft_quotes
set customer_id = 1438 where sft_quotes.customername = "B&R Industries, Inc.";
update sft_quotes
set customer_id = 43 where sft_quotes.customername = "Belden";
update sft_quotes
set customer_id = 1236 where sft_quotes.customername = "CAMtech Precision Mfg. - Auburn";
update sft_quotes
set customer_id = 901 where sft_quotes.customername = "K.HEIN MACHINES INC.";
update sft_quotes
set customer_id = 1076 where sft_quotes.customername = "Lakeside Industries Inc.";
update sft_quotes
set customer_id = 454 where sft_quotes.customername = "Thomas & Betts Corp.";
update sft_quotes
set customer_id = 454 where sft_quotes.customername = "PPC";
update sft_quotes
set customer_id = 353 where sft_quotes.customername = "HTM precision  inc.";
update sft_quotes
set customer_id = 1502 where sft_quotes.customername = "CUT-MARK, Inc.";
update sft_quotes
set customer_id = 936 where sft_quotes.customername = "Dennies Manufacturing, Inc.";
update sft_quotes
set customer_id = 1384 where sft_quotes.customername = "Detroit Name Plate Etching Company";
update sft_quotes
set customer_id = 1157 where sft_quotes.customername = "M&M Sheet Metal";
update sft_quotes
set customer_id = 1126 where sft_quotes.customername = "WesLor Enterprises, Inc.";
update sft_quotes
set customer_id = 1116 where sft_quotes.customername = "M&W STEEL SPECIALTIES";
update sft_quotes
set customer_id = 1453 where sft_quotes.customername = "Westcode";
update sft_quotes
set customer_id = 1416 where sft_quotes.customername = "Williams Tool Inc";
update sft_quotes
set customer_id = 1283 where sft_quotes.customername = "Wolfram Manufacturing Inc.";
update sft_quotes
set customer_id = 1320 where sft_quotes.customername = "Worthington Cylinders";
update sft_quotes
set customer_id = 1506 where sft_quotes.customername = "Universal Interiors";
update sft_quotes
set customer_id = 624 where sft_quotes.customername = "Thruway Fasteners, Inc.";
update sft_quotes
set customer_id = 1335 where sft_quotes.customername = "Taylor Metalworks Inc";
update sft_quotes
set customer_id = 1302 where sft_quotes.customername = "Suppy Technologies";
update sft_quotes
set customer_id = 1439 where sft_quotes.customername = "Staub Inc";
update sft_quotes
set customer_id = 742 where sft_quotes.customername = "Tech Development, Inc.";
update sft_quotes
set customer_id = 1207 where sft_quotes.customername = "Stewart's Fabrication";
update sft_quotes
set customer_id = 592 where sft_quotes.customername = "Springs Window FashionDiv";
update sft_quotes
set customer_id = 1268 where sft_quotes.customername = "Southern Glass";
update sft_quotes
set customer_id = 1501 where sft_quotes.customername = "Roberson Tool";
update sft_quotes
set customer_id = 66 where sft_quotes.customername = "Renolds Manufacturing";
update sft_quotes
set customer_id = 1156 where sft_quotes.customername = "Quality Metal Products";
update sft_quotes
set customer_id = 542 where sft_quotes.customername = "QRP Inc.";
update sft_quotes
set customer_id = 1061 where sft_quotes.customername = "PulseRay Inc.";
update sft_quotes
set customer_id = 536 where sft_quotes.customername = "Proto Fab Manufacturing";
update sft_quotes
set customer_id = 1303 where sft_quotes.customername = "Precise Tool & MFG";
update sft_quotes
set customer_id = 1308 where sft_quotes.customername = "PowerRail Distribution, Inc.";
update sft_quotes
set customer_id = 997 where sft_quotes.customername = "Pelucida";
update sft_quotes
set customer_id = 1215 where sft_quotes.customername = "Peko Precision Products";
update sft_quotes
set customer_id = 1436 where sft_quotes.customername = "P&G Steel Products";
update sft_quotes
set customer_id = 1280 where sft_quotes.customername = "NuWaves Engineering";
update sft_quotes
set customer_id = 1289 where sft_quotes.customername = "North Park Metalworkers Inc.";
update sft_quotes
set customer_id = 1227 where sft_quotes.customername = "Multiwire Laboratories Ltd.";
update sft_quotes
set customer_id = 1353 where sft_quotes.customername = "Military & Commercial Fabricators";
update sft_quotes
set customer_id = 477 where sft_quotes.customername = "MICRO INSTRUMENT CORP";
update sft_quotes
set customer_id = 938 where sft_quotes.customername = "MedPlast";
update sft_quotes
set customer_id = 1130 where sft_quotes.customername = "McAlpin Industries, Inc.";
update sft_quotes
set customer_id = 1287 where sft_quotes.customername = "MATECH";
update sft_quotes
set customer_id = 1492 where sft_quotes.customername = "Manufacturing Automation Systems, LLC";
update sft_quotes
set customer_id = 1354 where sft_quotes.customername = "Manth Manufacturing";
update sft_quotes
set customer_id = 1370 where sft_quotes.customername = "Machine True";
update sft_quotes
set customer_id = 451 where sft_quotes.customername = "Lockheed Martin";
update sft_quotes
set customer_id = 581 where sft_quotes.customername = "Konecranes";
update sft_quotes
set customer_id = 1183 where sft_quotes.customername = "Knise & Krick, Inc.";
update sft_quotes
set customer_id = 1431 where sft_quotes.customername = "Keystone Tool and Die";
update sft_quotes
set customer_id = 419 where sft_quotes.customername = "Keystone Parts";
update sft_quotes
set customer_id = 918 where sft_quotes.customername = "Innovative Manufacturing Solutions, LLC";
update sft_quotes
set customer_id = 353 where sft_quotes.customername = "HTM Precision Inc.";
update sft_quotes
set customer_id = 1341 where sft_quotes.customername = "Horschel Brothers Precision";
update sft_quotes
set customer_id = 1039 where sft_quotes.customername = "Hitachi Metals Automotive Components";
update sft_quotes
set customer_id = 1473 where sft_quotes.customername = "H & S Swansons Tool Co.";
update sft_quotes
set customer_id = 319 where sft_quotes.customername = "GUTIERREZ MACHINE";
update sft_quotes
set customer_id = 1371 where sft_quotes.customername = "Greene Technologies Incorporated";
update sft_quotes
set customer_id = 1474 where sft_quotes.customername = "Gowanda Electronics";
update sft_quotes
set customer_id = 1497 where sft_quotes.customername = "Freehold Manufacturing Assembly";
update sft_quotes
set customer_id = 1460 where sft_quotes.customername = "ForTech";
update sft_quotes
set customer_id = 1012 where sft_quotes.customername = "Forkey Fabrication Inc.";
update sft_quotes
set customer_id = 1081 where sft_quotes.customername = "FICS Solutions";
update sft_quotes
set customer_id = 1093 where sft_quotes.customername = "Fermer Precision";
update sft_quotes
set customer_id = 298 where sft_quotes.customername = "Fastenal Company-PTNY";
update sft_quotes
set customer_id = 1122 where sft_quotes.customername = "Addison Precision Mfg";
update sft_quotes
set customer_id = 33 where sft_quotes.customername = "Advanced Transit Manufacturing";
update sft_quotes
set customer_id = 1396 where sft_quotes.customername = "Arlington Machine and Tool Company";
update sft_quotes
set customer_id = 1284 where sft_quotes.customername = "BenCo Technology, LLC";
update sft_quotes
set customer_id = 1121 where sft_quotes.customername = "Badge Machine Products, Inc";
update sft_quotes
set customer_id = 1187 where sft_quotes.customername = "BinOptics Corporation";
update sft_quotes
set customer_id = 1178 where sft_quotes.customername = "Bombardier";
update sft_quotes
set customer_id = 1117 where sft_quotes.customername = "Canastota N/C Corp.";
update sft_quotes
set customer_id = 1254 where sft_quotes.customername = "Casey Machine Company, Inc.";
update sft_quotes
set customer_id = 109 where sft_quotes.customername = "Corning";
update sft_quotes
set customer_id = 1319 where sft_quotes.customername = "Creative Design and Machining";
update sft_quotes
set customer_id = 1247 where sft_quotes.customername = "Crown Industrial Corporation";
update sft_quotes
set customer_id = 1123 where sft_quotes.customername = "Custom Systems Integration Inc.";
update sft_quotes
set customer_id = 151 where sft_quotes.customername = "Dave's Mach.Tool&Design";
update sft_quotes
set customer_id = 1344 where sft_quotes.customername = "Dayton Rogers";
update sft_quotes
set customer_id = 1314 where sft_quotes.customername = "DOT Tool Company";
update sft_quotes
set customer_id = 1443 where sft_quotes.customername = "Dragonwrath-Innovations";
update sft_quotes
set customer_id = 158 where sft_quotes.customername = "Dyco Electronics";
update sft_quotes
set customer_id = 163 where sft_quotes.customername = "Eastern Metal of Elmira";
update sft_quotes
set customer_id = 1472 where sft_quotes.customername = "Electron Coil";
update sft_quotes
set customer_id = 539 where sft_quotes.customername = "Emhart Powers";
update sft_quotes
set customer_id = 130 where sft_quotes.customername = "English Manufacturing Inc.";
update sft_quotes
set customer_id = 130 where sft_quotes.customername = "English Machine Shop";
update sft_quotes
set customer_id = 1430 where sft_quotes.customername = "Enhanced Tool Inc.";




#Convert process name to process_id
update sft_quotes
set process_id = (select MIN(id) from sft_processes where sft_processes.name = sft_quotes.`process`);

#Fill in null processes due to name changes
update sft_quotes
set process_id = 5 where sft_quotes.`process` = "Black Anodize";
update sft_quotes
set process_id = 5 where sft_quotes.`process` = "BlAn";
update sft_quotes
set process_id = 6 where sft_quotes.`process` = "Black Anodize Teflon";
update sft_quotes
set process_id = 9 where sft_quotes.`process` = "Black Oxide";
update sft_quotes
set process_id = 9 where sft_quotes.`process` = "BlOx";
update sft_quotes
set process_id = 10 where sft_quotes.`process` = "Blue Anodize";
update sft_quotes
set process_id = 12 where sft_quotes.`process` = "Brass";
update sft_quotes
set process_id = 16 where sft_quotes.`process` = "Cad Clear";
update sft_quotes
set process_id = 16 where sft_quotes.`process` = "CadCl";
update sft_quotes
set process_id = 16 where sft_quotes.`process` = "Cadmium No Chromate";
update sft_quotes
set process_id = 17 where sft_quotes.`process` = "Cadmium over Electroless Nickel";
update sft_quotes
set process_id = 20 where sft_quotes.`process` = "CadYl";
update sft_quotes
set process_id = 43 where sft_quotes.`process` = "Chrome Impregnation";
update sft_quotes
set process_id = 30 where sft_quotes.`process` = "Clear Trivalent Chromate";
update sft_quotes
set process_id = 30 where sft_quotes.`process` = "ChConCl";
update sft_quotes
set process_id = 30 where sft_quotes.`process` = "Chemical Conversion RoHS (Alodize)";
update sft_quotes
set process_id = 31 where sft_quotes.`process` = "ChConYl";
update sft_quotes
set process_id = 34 where sft_quotes.`process` = "Clear Anodize";
update sft_quotes
set process_id = 34 where sft_quotes.`process` = "ClAn";
update sft_quotes
set process_id = 38 where sft_quotes.`process` = "Clean";
update sft_quotes
set process_id = 38 where sft_quotes.`process` = "Clean and de-scale";
update sft_quotes
set process_id = 42 where sft_quotes.`process` = "Cr(H)";
update sft_quotes
set process_id = 42 where sft_quotes.`process` = "FLASH CHROME";
update sft_quotes
set process_id = 45 where sft_quotes.`process` = "Copper";
update sft_quotes
set process_id = 46 where sft_quotes.`process` = "Copper Black Oxide";
update sft_quotes
set process_id = 65 where sft_quotes.`process` = "Electropolish";
update sft_quotes
set process_id = 66 where sft_quotes.`process` = "EN";
update sft_quotes
set process_id = 70 where sft_quotes.`process` = "EN(Tef)";
update sft_quotes
set process_id = 81 where sft_quotes.`process` = "GrnAn";
update sft_quotes
set process_id = 81 where sft_quotes.`process` = "Green Anodize";
update sft_quotes
set process_id = 82 where sft_quotes.`process` = "Gray Anodize";
update sft_quotes
set process_id = 83 where sft_quotes.`process` = "Hard Anodize";
update sft_quotes
set process_id = 83 where sft_quotes.`process` = "HdAn";
update sft_quotes
set process_id = 83 where sft_quotes.`process` = "Hard Clear Anodize";
update sft_quotes
set process_id = 84 where sft_quotes.`process` = "Hard Anodize Teflon";
update sft_quotes
set process_id = 86 where sft_quotes.`process` = "Hard Black Anodize";
update sft_quotes
set process_id = 86 where sft_quotes.`process` = "HdBlAn";
update sft_quotes
set process_id = 85 where sft_quotes.`process` = "Hard Black Anodize Teflon";
update sft_quotes
set process_id = 92 where sft_quotes.`process` = "Manganese Phosphat";
update sft_quotes
set process_id = 97 where sft_quotes.`process` = "Mechanical Zinc Clear";
update sft_quotes
set process_id = 105 where sft_quotes.`process` = "Nickel Bright";
update sft_quotes
set process_id = 122 where sft_quotes.`process` = "Prime & Paint";
update sft_quotes
set process_id = 122 where sft_quotes.`process` = "Paint 1069 Rustoleum Primer";
update sft_quotes
set process_id = 123 where sft_quotes.`process` = "Passivate";
update sft_quotes
set process_id = 123 where sft_quotes.`process` = "Pass";
update sft_quotes
set process_id = 124 where sft_quotes.`process` = "Passivate and Black Oxide";
update sft_quotes
set process_id = 125 where sft_quotes.`process` = "Phosphat";
update sft_quotes
set process_id = 125 where sft_quotes.`process` = "Phosphate";
update sft_quotes
set process_id = 130 where sft_quotes.`process` = "Red Anodize";
update sft_quotes
set process_id = 133 where sft_quotes.`process` = "Tin Bright";
update sft_quotes
set process_id = 134 where sft_quotes.`process` = "Tin Dull";
update sft_quotes
set process_id = 144 where sft_quotes.`process` = "TEFLON";
update sft_quotes
set process_id = 148 where sft_quotes.`process` = "Violet Anodize";
update sft_quotes
set process_id = 159 where sft_quotes.`process` = "Zinc Clear Chromate";
update sft_quotes
set process_id = 155 where sft_quotes.`process` = "Zinc Black Chromate";
update sft_quotes
set process_id = 155 where sft_quotes.`process` = "ZINC BLACK";
update sft_quotes
set process_id = 157 where sft_quotes.`process` = "Zinc Black Tri-Valent Chromate";
update sft_quotes
set process_id = 171 where sft_quotes.`process` = "Zinc Olive Drab";
update sft_quotes
set process_id = 173 where sft_quotes.`process` = "Zinc Phosphate";
update sft_quotes
set process_id = 186 where sft_quotes.`process` = "Zinc Yellow Trivalent";
update sft_quotes
set process_id = 220 where sft_quotes.`process` = "Zinc-Nickel Black RoHS";
update sft_quotes
set process_id = 226 where sft_quotes.`process` = "Oil";



##
SELECT sum(value_min) 
FROM (SELECT value_min FROM `sft_quotes` ORDER BY id DESC LIMIT 10) t1;

SELECT sum(quantity_minimum) 
FROM (SELECT quantity_minimum FROM `sft_quotes` ORDER BY id DESC LIMIT 10) t1;