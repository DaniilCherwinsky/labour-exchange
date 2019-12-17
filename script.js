var modal = document.getElementById("myModal");
var span = document.getElementsByClassName("close")[0];

$('.atuin-btn').click(function(event){
    modal.style.display = "flex";
});
span.onclick = function(){
    modal.style.display = "none";
}
window.onclick = function(event){
    if(event.target == modal){
        modal.style.display = "none";
    }
}

function jobResponse(id){
    $('input[name = job_id').val(id);
}