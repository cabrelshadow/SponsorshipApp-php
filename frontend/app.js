"use strict";

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
      //   Array(JSON.parse(xhr.response))[0].forEach((child) => {});
      Array(JSON.parse(xhr.response))[0].filter((el) => {
        console.log(el);
      });
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

// FrontMain();
