MyMVC = {
    init: function() {
        document.getElementById('pageInfo').innerHTML = document.getElementById('pageRes').innerHTML;
        document.getElementById('pageRes').innerHTML = '';
    }
}

jQuery(function(){
    MyMVC.init();
});