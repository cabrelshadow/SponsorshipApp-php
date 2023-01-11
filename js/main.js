import FrontMain from "./modules/main.js";

(async () => {
  await HttpRequest("GET", "../backend/sponsorship.php");
  await HttpRequestToSendMail("GET", "../backend/sponsorship.php");
})();
/**
 *
 * @param {*} method
 * @param {*} url
 * @returns
 */
function HttpRequest(method, url) {
  const xhr = new XMLHttpRequest();
  const children = [];
  let promise;
  xhr.onreadystatechange = () => {
    if (xhr.readyState == 4 && xhr.status === 200) {
      let filleuls = "";
      Array(JSON.parse(xhr.response))[0].forEach((child) => {
        const test = "ton front";
        filleuls += `
        
           <div class="parrain">
           <div class="container_top">

            <div class="wrapper">
                <div class="clash-card barbarian">
                    <div class="clash-card__image clash-card__image--barbarian">
                        <img src="${
                          child["PARRAIN_picture"]
                            ? "../upload/" + child["PARRAIN_picture"]
                            : "../assets/def.jpg"
                        }" alt="barbarian" />
                    </div>
                    <div class="clash-card__level clash-card__level--barbarian">${
                      child["PARRAIN_NAME"]
                    }</div>
                    <div class="clash-card__unit-name">Eleve ${
                      child["PARRAIN_faculty"]
                    }</div>
                    <div class="clash-card__unit-description">
                        Parrain<br>


                    </div>

                    <div class="clash-card__unit-stats clash-card__unit-stats--barbarian clearfix">
                        <div class="one-third">
                            <div class="stat">Email</div>
                            <div class="stat-value">${
                              child["PARRAIN_email"]
                            }</div>
                        </div>

                        <div class="one-third">
                            <div class="stat">Numero</div>
                            <div class="stat-value">${
                              child["PARRAIN_phone"]
                            }</div>
                        </div>

                        <div class="one-third no-border">
                            <div class="stat">Filiere</div>
                            <div class="stat-value"> ${
                              child["PARRAIN_faculty"]
                            }</div>
                        </div>

                    </div>

                </div>
            </div>



        </div>

        

        <div class="container_bottom" id="filleul${child["PARRAIN_ID"]}">
        </div>
           </div>
        `;

        // document.addEventListener("DOMContentLoaded", (e) => {
        setTimeout(() => {
          let childrens = "";
          Array(child["PARRAIN_filleuls"])[0].forEach((filleul) => {
            childrens += `
              <div class="wrapper">
                <div class="clash-card barbarian">
                    <div class="clash-card__image clash-card__image--barbarian">
                        <img src="../assets/5.webp" alt="barbarian" />
                    </div>
                    <div class="clash-card__level clash-card__level--barbarian">${filleul["FULLNAME"]}</div>
                    <div class="clash-card__unit-name">Eleve ${filleul["FACULTY"]}</div>
                    <div class="clash-card__unit-description">
                        Filleul<br>


                    </div>

                    <div class="clash-card__unit-stats clash-card__unit-stats--barbarian clearfix">
                        <div class="one-third">
                            <div class="stat">Email</div>
                            <div class="stat-value">${filleul["EMAIL"]}</div>
                        </div>

                        <div class="one-third">
                            <div class="stat">Numero</div>
                            <div class="stat-value">${filleul["PHONE"]}</div>
                        </div>

                        <div class="one-third no-border">
                            <div class="stat">Filiere</div>
                            <div class="stat-value">${filleul["FACULTY"]}</div>
                        </div>

                    </div>

                </div>
            </div>
            
          
          
            
           
                `;
            getNode("#filleul" + child["PARRAIN_ID"]).innerHTML = childrens;
          });
        }, 3000);
        // });
      });

      getNode("#sponsorship").innerHTML = filleuls;

      // console.log(childrens);

      // console.log(filleuls)

      return children;
    }
  };
  xhr.open(method, url);
  xhr.send();
}
/**
 *
 * @param {*} el
 * @returns
 */
function getNode(el) {
  return document.querySelector(el);
}
let current = 0;
setTimeout(() => {
  const AllParrain = document.querySelectorAll(".parrain");
  for (const p in AllParrain) {
    if (Object.hasOwnProperty.call(AllParrain, p)) {
      const parrain = AllParrain[p];
      parrain.style.display = "none";
    }
  }
  AllParrain[current].classList.add("anim");
  AllParrain[current].style.display = "block";
  AllParrain[current].setAttribute("data-current", current);
  Carousel();
}, 6000);

function Carousel() {
  const AllParrain = document.querySelectorAll(".parrain");
  current++;
  setTimeout(() => {
    console.log(current);
    AllParrain[current - 1].style.display = "none";
    AllParrain[current - 1].classList.remove("anim");
    AllParrain[current].style.display = "block";
    AllParrain[current].classList.add("anim");
    // AllParrain[current].style.backgroundColor =
    //   "#" + Math.floor(Math.random() * 16777215).toString(16);
    AllParrain[current].setAttribute("data-current", current);
  }, 14000);
  setTimeout(Carousel, 14000);
}

const audio = new Audio("../assets/Halo Theme Song Original.weba");
audio.loop = true;
document.addEventListener("keyup", (e) => {
  e.code = "Space" && audio.play();
});

// FrontMain();
/**
 * 
 * <div class="wrapper">
                <div class="clash-card barbarian">
                    <div class="clash-card__image clash-card__image--barbarian">
                        <img src="../assets/5.webp" alt="barbarian" />
                    </div>
                    <div class="clash-card__level clash-card__level--barbarian">Sado scott</div>
                    <div class="clash-card__unit-name">Eleve de tic pam 1</div>
                    <div class="clash-card__unit-description">
                        Parrain<br>


                    </div>

                    <div class="clash-card__unit-stats clash-card__unit-stats--barbarian clearfix">
                        <div class="one-third">
                            <div class="stat">Email</div>
                            <div class="stat-value">sado@gmail.com</div>
                        </div>

                        <div class="one-third">
                            <div class="stat">Numero</div>
                            <div class="stat-value">698458434</div>
                        </div>

                        <div class="one-third no-border">
                            <div class="stat">Filiere</div>
                            <div class="stat-value">Tic pam 2</div>
                        </div>

                    </div>

                </div>
            </div>
 * 
 */
/**
 *
 * @param {*} method
 * @param {*} url
 * @returns
 */
function HttpRequestToSendMail(method, url) {
  const xhr = new XMLHttpRequest();
  const children = [];
  let promise;
  xhr.onreadystatechange = () => {
    if (xhr.readyState == 4 && xhr.status === 200) {
      Array(JSON.parse(xhr.response))[0].forEach((child) => {
        setTimeout(() => {
          child["PARRAIN_filleuls"].forEach((filleul) => {
            Email.send({
              SecureToken: "C973D7AD-F097-4B95-91F4-40ABC5567812",
              To: filleul.EMAIL,
              From: "you@isp.com",
              Subject: "This is the subject",
              Body: "And this is the body"
            })
              .then((message) =>
                console.log("Email envoyé au filleul " + filleul.FULLNAME + ".")
              )
              .catch((err) => {
                console.log(err);
              });
          });
        }, 5000);
        /*  Email.send({
          SecureToken: "59f1a3fc-a669-4c80-b705-9e2a7816b891",
          To: "francisalaphia5@gmail.com",
          From: "francisalaphia5@gmail.com",
          Subject: "This is the subject",
          Body: "And this is the body"
        })
          .then((message) => {
            console.log(message);
            console.log("Email envoyé au filleul " + "test" + ".");
          })
          .catch((err) => {
            console.log(err);
          }); */
      });
      return children;
    }
  };
  xhr.open(method, url);
  xhr.send();
}
