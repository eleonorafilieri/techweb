//Funzioni parametrizzate ma mai usate :(
window.ajax = function ajax(method, url, data, successCallback, errorCallback){
	    
    $.ajax({
        url: url,
        data: getJSON(data),
        contentType: 'application/json;charset=UTF-8',
        type: method,
        success: successCallback,
        error: errorCallback,
    });
}

window.getJSON = function getJSON(formData){
    return JSON.stringify(formData);
}
