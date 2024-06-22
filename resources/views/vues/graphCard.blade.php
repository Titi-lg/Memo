<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courbe de l'oubli</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns"></script>
</head>
<body>
@extends('layouts.master')
    <canvas id="forgettingCurveChart" width="800" height="400"></canvas>
    <script>
        // Fonction pour dessiner la courbe de l'oubli
        function drawForgettingCurveChart(data) {
            const ctx = document.getElementById('forgettingCurveChart').getContext('2d');

            // Extraire les dates et les rétentions des données
            const dates = Object.keys(data);
            const retentions = Object.values(data);

            // Configurer le graphique
            const config = {
                type: 'line',
                data: {
                    labels: dates,
                    datasets: [{
                        label: 'Rétention (%)',
                        data: retentions,
                        borderColor: 'rgba(75, 192, 192, 1)',
                        fill: false
                    }]
                },
                options: {
                    responsive: true,
                    title: {
                        display: true,
                        text: 'Courbe de l\'oubli'
                    },
                    scales: {
                        x: {
                            type: 'time',
                            display: true,
                            time: {
                                unit: 'day',
                                displayFormats: {
                                    day: 'MMM d'
                                }
                            },
                            title: {
                                display: true,
                                text: 'Date'
                            }
                        },
                        y: {
                            display: true,
                            title: {
                                display: true,
                                text: 'Rétention (%)'
                            }
                        }
                    }
                }
            };

            // Dessiner le graphique
            new Chart(ctx, config);
        }

        // Les données générées par la fonction graph PHP

        // Dessiner le graphique avec les données
        drawForgettingCurveChart({!! json_encode($data) !!});
    </script>
</body>
</html>
