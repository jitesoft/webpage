import { CookieConsent } from 'cookie-sanction';

const onClick = function(event) {
  event.preventDefault();
  let _nodes = document.querySelectorAll('div[id^="content"]');
  let _name = this.getAttribute('data-href');
  for (let i = _nodes.length; i-->0;) {
    _nodes[i].classList.add('hidden');
  }
  document.querySelector(`#content-${_name}`).classList.remove('hidden');
};

window.onload = () => {
  const consent = new CookieConsent();
  consent.active().then(() => {
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-90343888-1', 'auto');
    ga('send', 'pageview');
  });

  let links = document.querySelectorAll('.link-internal');
  for (let i = links.length; i-->0;) {
    links.item(i).addEventListener('click', onClick);
  }
};
