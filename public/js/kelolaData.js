
    function tampilTabel(url,data){
        console.log(url);
    console.log("Ok")
    $("#table").DataTable({
    "ajax": {
        "url" : url,
        "dataSrc" : ""
    },
    "columns" : data
    })
}
