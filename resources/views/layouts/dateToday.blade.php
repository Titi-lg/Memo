<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script><div id="date-display"></div>
<div id="date-display"></div>
<script>
    var now = moment().format('dddd, MMMM Do YYYY, h:mm:ss a');
    document.getElementById('date-display').innerText = now;
</script>
<style>
    #date-display {
        font-family: 'Arial', sans-serif;
        font-size: 2em;
        text-align: center;
        padding: 20px;
        color: #333;
    }
</style>
