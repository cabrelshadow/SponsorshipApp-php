(async()=>{
    const r =await HttpRequest("GET","../backend/sponsorship.php")
    console.log(r)
})()
/**
 * 
 * @param {*} method 
 * @param {*} url 
 * @returns 
 */
function HttpRequest(method,url){
    const xhr = new XMLHttpRequest();
    const children = []
    let promise;
    xhr.onreadystatechange = ()=>{
        if(xhr.readyState ==4 && xhr.status ===200){
           let filleuls = ""
            Array(JSON.parse(xhr.response))[0].forEach(child => {
                filleuls+=`
                <div class="parrain">
                <div class="parrain-content">
                <img src="../assets/def.jpg" alt="parrain">
                <div class="info">
                <h6>${child["FULLNAME"]}</h6>
                <h6>${child["PHONE"]}</h6>
                <h6>${child["EMAIL"]}</h6>
                </div>
                </div>
                <div class="filleuls">
                    <div class="filleul">
                        <img src="${child[4]?'../upload/'+child[4]:'../assets/def.jpg'}" alt="filleul">
                        <div class="info">
                            <h6><i class="fas fa-user"></i> ${child["0"]}</h6>
                            <p> <i class="fas fa-phone"></i>${child[1]}</p>
                            <p><i class="fas fa-envelope"></i>${child[2]}</p>
                        </div>
                    </div>
                </div>
            </div>
                `
                getNode(".sponsorships").innerHTML = filleuls
                // console.log(child)
            });
            // console.log(filleuls)
            
            return children
        }
    }
    xhr.open(method,url)
    xhr.send()

    
}
/**
 * 
 * @param {*} el 
 * @returns 
 */
function getNode(el){
    return document.querySelector(el)
}
let current = 0
setTimeout(() => {
    const AllParrain = document.querySelectorAll(".parrain")
    for (const p in AllParrain) {
        if (Object.hasOwnProperty.call(AllParrain, p)) {
            const parrain = AllParrain[p];
            parrain.style.display="none"
        }
    }
AllParrain[current].style.display="block"
AllParrain[current].setAttribute("data-current",current)
Carousel(AllParrain)
}, 2000);


function Carousel(){
    const AllParrain = document.querySelectorAll(".parrain")
    current++;
    setTimeout(() => {
        console.log(current)
    AllParrain[current-1].style.display="none";
    AllParrain[current].style.display="block"
    AllParrain[current].style.backgroundColor="#"+Math.floor(Math.random()*16777215).toString(16)
    AllParrain[current].setAttribute("data-current",current);
    }, 2000);
    setTimeout(Carousel,5000);
}