function getData() {
    var x = document.getElementById("uploadForm");
    var username = x.elements[0].value;
    var email = x.elements[1].value;
    var title = x.elements[2].value;
    var content = x.elements[3].value;
    document.getElementById("username").innerHTML = username;
    document.getElementById("email").innerHTML = email;
    document.getElementById("title").innerHTML = title;
    document.getElementById("content").innerHTML = content;
}

function getImage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#image')
                .attr('src', e.target.result)
                .width(320)
                .height(240);
           };
        reader.readAsDataURL(input.files[0]);
    }
}