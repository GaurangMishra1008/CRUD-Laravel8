$("#save").click(function(e) {
    e.preventDefault();
    console.log("Save Button clicked");
    $nam = $("#name").val();
    $("#subject").val();
    $("#description").val();
    console.log($nam)
});