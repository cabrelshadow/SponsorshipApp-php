import FrontMain from "./modules/main.js";

(async () => {
  const r = await HttpRequest("GET", "../backend/sponsorship.php");
  console.log(r);
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
        filleuls += `
        
           <div class="parrain">
           <div class="container_top">

            <div class="wrapper">
                <div class="clash-card barbarian">
                    <div class="clash-card__image clash-card__image--barbarian">
                        <img src="${
                          child[4]
                            ? "../upload/" + child[4]
                            : "../assets/def.jpg"
                        }" alt="barbarian" />
                    </div>
                    <div class="clash-card__level clash-card__level--barbarian">${
                      child["0"]
                    }</div>
                    <div class="clash-card__unit-name">Eleve ${child[3]}</div>
                    <div class="clash-card__unit-description">
                        Parrain<br>


                    </div>

                    <div class="clash-card__unit-stats clash-card__unit-stats--barbarian clearfix">
                        <div class="one-third">
                            <div class="stat">Email</div>
                            <div class="stat-value">${child[2]}</div>
                        </div>

                        <div class="one-third">
                            <div class="stat">Numero</div>
                            <div class="stat-value">${child[1]}</div>
                        </div>

                        <div class="one-third no-border">
                            <div class="stat">Filiere</div>
                            <div class="stat-value"> ${child[3]}</div>
                        </div>

                    </div>

                </div>
            </div>



        </div>


        <div class="container_bottom">

            <div class="wrapper">
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
            <div class="wrapper">
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
           </div>
           </div>
                `;
        getNode("#sponsorship").innerHTML = filleuls;
        // console.log(child)
      });
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
  AllParrain[current].style.display = "block";
  AllParrain[current].setAttribute("data-current", current);
  Carousel();
}, 2000);

function Carousel() {
  const AllParrain = document.querySelectorAll(".parrain");
  current++;
  setTimeout(() => {
    console.log(current);
    AllParrain[current - 1].style.display = "none";
    AllParrain[current].style.display = "block";
    AllParrain[current].style.backgroundColor =
      //   "#" + Math.floor(Math.random() * 16777215).toString(16);
      AllParrain[current].setAttribute("data-current", current);
  }, 2000);
  setTimeout(Carousel, 14000);
}

const audio = new Audio("../assets/Halo Theme Song Original.weba");
audio.loop = true;
document.addEventListener("keyup", (e) => {
  e.code = "Space" && audio.play();
});

// FrontMain();
