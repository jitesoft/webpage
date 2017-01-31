var onClick = function(e) {
    e.preventDefault();

    var _nodes = document.querySelectorAll('div[id^="content"]');
    var _name = this.classList.item(1);
    var i =_nodes.length;

    for(i;i-->0;) {
        _nodes.item(i).classList.add("hidden");
    }

    document.querySelector('#content-' + _name).classList.remove('hidden');
};

var links = document.querySelectorAll('.link');
for(var i=links.length;i-->0;) {
    links.item(i).addEventListener('click', onClick);
}
