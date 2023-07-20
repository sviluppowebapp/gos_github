<script>
function overlayMsg(str){
  let content, overlay = document.getElementById('body_overlay');
  if (!overlay){
    const style = document.createElement('style');
    const loader = document.createElement('div');
    content = document.createElement('div');
    overlay = document.createElement('div');
    content.id = 'body_overlay_content';
    overlay.id = 'body_overlay';
    loader.classList.add('lds-ellipsis');
    loader.innerHTML = '<div></div><div></div><div></div><div></div>';
    style.innerText = `
#body_overlay{
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  z-index: 999999;
  padding-top: 25vh;
  color: #fff;
  font: bold 1.8em "Segoe UI", Verdana, Tahoma, Arial, sans-serif;
  background: #000b;
  opacity: 0;
  transition: .8s;
}
#body_overlay_content{
  
}
.lds-ellipsis {
  display: inline-block;
  position: relative;
  width: 80px;
  height: 80px;
}
.lds-ellipsis div {
  position: absolute;
  top: 33px;
  width: 13px;
  height: 13px;
  border-radius: 50%;
  background: #fff;
  animation-timing-function: cubic-bezier(0, 1, 1, 0);
}
.lds-ellipsis div:nth-child(1) {
  left: 8px;
  animation: lds-ellipsis1 0.6s infinite;
}
.lds-ellipsis div:nth-child(2) {
  left: 8px;
  animation: lds-ellipsis2 0.6s infinite;
}
.lds-ellipsis div:nth-child(3) {
  left: 32px;
  animation: lds-ellipsis2 0.6s infinite;
}
.lds-ellipsis div:nth-child(4) {
  left: 56px;
  animation: lds-ellipsis3 0.6s infinite;
}
@keyframes lds-ellipsis1 {
  0% {transform: scale(0);}
  100% {transform: scale(1);}
}
@keyframes lds-ellipsis3 {
  0% {transform: scale(1);}
  100% {transform: scale(0);}
}
@keyframes lds-ellipsis2 {
  0% {transform: translate(0, 0);}
  100% {transform: translate(24px, 0);}
}
    `;
    overlay.appendChild(style);
    overlay.appendChild(content);
    overlay.appendChild(loader);
    document.body.appendChild(overlay);
    setTimeout(()=>{overlay.style.opacity = '1';}, 100);
  }
  content.innerHTML = str;
}

document.querySelector('#modulo button[type="submit"]').addEventListener('click', ()=>{overlayMsg('Generazione avvenuta correttamente!<br>Attendi qualche secondo e sarai reindirizzato alla home page');})
</script>