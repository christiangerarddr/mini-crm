$(document).ready( function () {


    $("#serverSideRenderBtn").on('click',function(){
        switchSide();
    });

    function switchSide(){
        if((sessionStorage.getItem("serverSideRender") == null)){
            sessionStorage.setItem("serverSideRender", 1);
        }else{

            var isServerSide = sessionStorage.getItem("serverSideRender");
            var state = (isServerSide == 1) ? 0 : 1;

            sessionStorage.setItem("serverSideRender", state);

        };

        location.reload();
    }


});