(async()=>{
    await HttpRequest("GET","../backend/sponsorship.php")
})()

function HttpRequest(method,url){
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = ()=>{
        if(xhr.readyState ==4 && xhr.status ===200){
            console.log(JSON.parse(xhr.response)[0])
        }
    }
    xhr.open(method,url)
    xhr.send()
}