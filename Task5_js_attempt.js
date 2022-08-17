document.getElementById('myButton').onclick = function(){

    var myData = new FormData();
    
    myData.append('myText',document.getElementsByName('myText').value);
    fetch('Task5_php_Strat.php',{
        method: "POST",
        body: myData
    }).then((result) => {
        if (result.status != 200) { throw new Error("Bad Server Response"); }
        return result.text();
    }).then((response) => {
        console.log(response);
    }).catch((error) => { console.log(error); });    

};