window.test = function(e) {
    let balance = document.querySelector("input[type='hidden']").value;

    if(e.value === '0'){
      let newBal = (0 * parseFloat(balance) * 0.185) + parseFloat(balance);
      let twoDecimalBal = newBal.toFixed(2);
      $("#newBal").text(twoDecimalBal);
    }else if(e.value === '1'){
        let newBal = (1 * parseFloat(balance) * 0.185) + parseFloat(balance);
        let twoDecimalBal = newBal.toFixed(2);
        $("#newBal").text(twoDecimalBal);
    }else if (e.value === '2'){
      let newBal = (2 * parseFloat(balance) * 0.185) + parseFloat(balance);
      let twoDecimalBal = newBal.toFixed(2);
      $("#newBal").text(twoDecimalBal);
    }else if (e.value === '3'){
      let newBal = (3 * parseFloat(balance) * 0.185) + parseFloat(balance);
      let twoDecimalBal = newBal.toFixed(2);
      $("#newBal").text(twoDecimalBal);
    }else if (e.value === '4'){
      let newBal = (4* parseFloat(balance) * 0.185) + parseFloat(balance);
      let twoDecimalBal = newBal.toFixed(2);
      $("#newBal").text(twoDecimalBal);
    }else if (e.value === '5'){
      let newBal = (5 * parseFloat(balance) * 0.185) + parseFloat(balance);
      let twoDecimalBal = newBal.toFixed(2);
      $("#newBal").text(twoDecimalBal);
    }else if (e.value === '6'){
      let newBal = (6 * parseFloat(balance) * 0.185) + parseFloat(balance);
      let twoDecimalBal = newBal.toFixed(2);
      $("#newBal").text(twoDecimalBal);
    }else if (e.value === '7'){
      let newBal = (7 * parseFloat(balance) * 0.185) + parseFloat(balance);
      let twoDecimalBal = newBal.toFixed(2);
      $("#newBal").text(twoDecimalBal);
    }else if (e.value === '8'){
      let newBal = (8 * parseFloat(balance) * 0.185) + parseFloat(balance);
      let twoDecimalBal = newBal.toFixed(2);
      $("#newBal").text(twoDecimalBal);
    }else if (e.value === '9'){
      let newBal = (9 * parseFloat(balance) * 0.185) + parseFloat(balance);
      let twoDecimalBal = newBal.toFixed(2);
      $("#newBal").text(twoDecimalBal);
    }else if (e.value === '10'){
      let newBal = (10 * parseFloat(balance) * 0.185) + parseFloat(balance);
      let twoDecimalBal = newBal.toFixed(2);
      $("#newBal").text(twoDecimalBal);
    }
  }