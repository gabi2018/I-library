function ajax(object){
    return new Promise(function(resolve, reject){
        $.ajax(object).done(resolve).fail(reject);
    });
}

function sectorEvent(){
    let sectorname = document.getElementById('sectorname').value,
        method     = document.getElementById('sector-form').method,
        action     = 'http://localhost/i-library/sectors/store',
        payload    = {sectorname: sectorname},
        object     = {  url: action,
                        type: method,
                        contentType: 'application/json',
                        data: payload
                     };
    
    ajax(object).then(function resolve(data){
        console.log(data);
    }, function reject(reason){
        console.log('error Fatal');
        console.log(reason);
    });
} 