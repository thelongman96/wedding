$("#rsvpForm").submit(function(e) {
console.log('boom')
    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $(this);
    var actionUrl = 'formEmailer.php';
    
    $.ajax({
        type: "POST",
        url: actionUrl,
        data: form.serialize(), // serializes the form's elements.
        success: function(data)
        {
          alert(data); // show response from the php script.
        }
    });
});