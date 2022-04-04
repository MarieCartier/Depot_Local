var element = document.getElementById("supprimer");

element.addEventListener("click", function(event) 
{
    var choix = confirm("Voulez-vous vraiment supprimer ce disque ?")

    if ( choix == false)
    {
        event.preventDefault();
    }
});