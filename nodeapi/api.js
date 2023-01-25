const axios = require("axios");
const excelToJson = require("convert-excel-to-json");
const fs = require("fs");
// get the client
const mysql = require('mysql2');
const fac = "Prepa 01"
// create the connection to database
const connection = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password:"",
  database: 'sponsorsphipbd'
});
const result = excelToJson({
  sourceFile: "./Projet_du_Parrainage.xlsx",
  sheets: [fac],
});

const T1 = result;

result[fac].splice(0, 2);
const data = [];



for (const k in result[fac]) {
  if (Object.hasOwnProperty.call(result[fac], k)) {
    const element = result[fac][k];
    const fData = {
      fullname: String(element["C"]).replace(/[ ]*'[ ]*|[ ]+/g," "),
      tel: element["D"],
      email: element["E"],
     fac:element["A"]+"-"+element["B"]
    };
    connection.query("INSERT INTO filleuls (FULLNAME, PHONE,EMAIL,FACULTY) VALUES ('"+fData.fullname+"','"+fData.tel+"','"+fData.email+"','"+fData.fac+"')")
     axios.post("http://localhost:86/backend/injectdata.php",fData).then((re)=>{
        console.log(re.code)
    });
   console.log(fData);
    
  }
}


// console.log(result[fac][1]);

// fs.writeFile("formatdataTI01.json", JSON.stringify(data), {}, (e) => {});
// fs.writeFile("dataTI02.json", JSON.stringify(result["TI 02"]),{},(e)=>{

// });
// console.log(result);