var feedback = function(res) {
    if (res.success === true) {
        var get_link = res.data.link.replace(/^http:\/\//i, 'https://');
        // document.querySelector('.status').classList.add('bg-success');
        document.querySelector('.status').innerHTML =
            '<input name="file" class="image-url" value=\"' + get_link + '\"/ style="display: none;">' + '<img class="img" alt="Imgur-Upload" src=\"' + get_link + '\"/ style="width: 300px;">';
    }
};

new Imgur({
    clientid: 'b1f6d6fad52b793', //You can change this ClientID
    callback: feedback
});