(function (win, doc) {
    'use strict';

    let ppp;
    let payment_id;
    let mode = 'sandbox';

    function getRoot() {
        return win.location.protocol + "//" + doc.location.hostname + "/Site/dialog/";
    }

    async function getCheckout() {
        let response = await fetch(getRoot() + 'paypalInvoice', {
            method: 'POST',
            headers: {
                Accept: 'application/json',
                'Content-Type': 'application/json'
            }
        });
        let json = await response.json()
        ppp = await PAYPAL.apps.PPP({

            "approvalUrl": json.links[1].href,
            "placeholder": "ppplus",
            "payerEmail": "gabrieldossantosvargas@gmail.com",
            "payerFirstName": "Gabriel",
            "payerLastName": "Vargas",
            "payerTaxId": "10034389970",
            "language": "pt_BR",
            "country": "BR",
            "mode": mode
        });
        payment_id = await json.id;
        doc.querySelector('#continueButton').style.display = "block";
    }

    win.checkout = getCheckout;

    async function messageListener(event) {
        try {
            //this is how we extract the message from the incoming events, data format should look like {"action":"inlineCheckout","checkoutSession":"error","result":"missing data in the credit card form"}
            let data = JSON.parse(event.data);
            if (data.result.state === "APPROVED"){
                let response = await fetch(getRoot() + 'paypalPayment', {
                    method: 'POST',
                    headers: {
                        Accept: 'application/json',
                        'Content-Type': 'application/json'
                    },
                    body:JSON.stringify({
                        payment_id: payment_id,
                        payer_id : data.result.payer.payer_info.payer_id
                    })
                });
                let json = await response.json()
                doc.querySelector("#continueButton").style.display = 'none'
                doc.querySelector("body").style.backgroundColor = 'green'
                doc.querySelector("#ppplus").innerHTML = 'SEU PAGAMENTO FOI APROVADO'
            }
            //insert logic here to handle success events or errors, if any

        } catch (exc) {
        }
    }

    if (doc.querySelector('#continueButton')) {
        doc.querySelector("#continueButton").addEventListener('click', (e) => {
            e.preventDefault();
            ppp.doContinue();
            if (win.addEventListener) {
                win.addEventListener("message", messageListener, false);
            } else if (win.attachEvent) {
                win.attachEvent("onmessage", messageListener);
            } else {
                throw new Error("Can't attach message listener");
            }


        })
    }
})(window, document)