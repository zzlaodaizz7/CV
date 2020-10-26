function updateQueryStringParameter(uri, key, value) {
    var re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
    var separator = uri.indexOf('?') !== -1 ? "&" : "?";
    if (uri.match(re)) {
        return uri.replace(re, '$1' + key + "=" + value + '$2');
    } else {
        return uri + separator + key + "=" + value;
    }
}

function totalPage(value) {
    let uri = window.location.href;
    window.location = updateQueryStringParameter(uri, 'per', value);
}

function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

function timeDefault(UNIX_timestamp) {
    let a = new Date(UNIX_timestamp * 1000);

    let year = a.getFullYear();
    let months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    let month = a.getMonth();
    let date = a.getDate();
    let hour = a.getHours() % 12;
    hour = hour ? hour : 12;
    let min = a.getMinutes();
    let ampm = hour >= 12 ? 'AM' : 'PM';

    return year + '-' + (month < 10 ? '0' + month : month) + '-' + (date < 10 ? '0' + date : date) + ' ' + (hour < 10 ? '0' + hour : hour) + ':' + (min < 10 ? '0' + min : min) + ' ' + ampm;
}

function objTime(UNIX_timestamp) {
    let a = new Date(UNIX_timestamp * 1000);

    let year = a.getFullYear();
    let month = a.getMonth();
    let date = a.getDate();
    let min = a.getMinutes();

    return {year, month, date, hour: a.getHours(), min};
}

function textReplaceLink(text) {
    if(text) {
        return text.replace(/((http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?)/g,
            '<a class="text-primary" target="_blank" href="$1">$1</a><a target="_blank" href="$1"><span class="fas fa-external-link-alt small"></span></a>'
        );
    }
    return text;
}

function htmlConfig(_id, _data, color = 'badge-success') {
    let html = '';

    if(_data) {
        let arr = _data.split(',');
        arr.forEach(function (element) {
            html += '<span class="badge '+ color +'">' + element + '</span>';
        });
    }

    return html;
}
