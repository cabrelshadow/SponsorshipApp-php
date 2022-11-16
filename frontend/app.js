
"use strict";
fetch("./result.json")
.then(function(res){
 return res.json();
})
.then(function(data){
    console.log(data.FULLNAME);
});
