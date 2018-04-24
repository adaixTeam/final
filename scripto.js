var config = {
    apiKey: "AIzaSyBbCMKkawXpCmlT_SqQS1bYskPXHkqcSTo",
    authDomain: "black-liste.firebaseapp.com",
    databaseURL: "https://black-liste.firebaseio.com",
    projectId: "black-liste",
    storageBucket: "black-liste.appspot.com",
    messagingSenderId: "33482074021"
  };
  firebase.initializeApp(config);

var rootRef = firebase.database().ref().child("location");


 $("#savebutton").click(function() {
    rootRef.push().set({
        nom: $("#nom").val(),
        prenom: $("#prenom").val(),
        cin: $("#cin").val(),
        ville: $("#ville").val(),
        motif: $("#motif").val(),
        date: $("#date").val(),
        agence: $("#agence").val()


    })
});
