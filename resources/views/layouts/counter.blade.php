<style>
    .counter {
        width: 100%;
        max-width: 600px;
        margin: 0 auto;
        margin-top: 100px;
        margin-right: 50px;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 4px;
    }

    .counter h2 {
        font-size: 2em;
        margin-bottom: 20px;
    }

    .counter p {
        font-size: 1.5em;
        margin-bottom: 20px;
    }

    .counter .btn {
        padding: 10px 20px;
        font-size: 1em;
        color: #fff;
        background-color: #007bff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .counter .btn:hover {
        background-color: #0056b3;
    }
</style>
<div class="counter">
    <h2>Nombre de Toeic</h2>
    <p>{{ strval($counterValue->value) }}</p>
    <button class="btn btn-primary" id="increment" onclick="window.location='{{url("increment")}}'">Incrementer</button>
</div>
