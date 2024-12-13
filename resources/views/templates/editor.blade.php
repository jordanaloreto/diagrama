@extends('layouts.app')

@section('content')
    <style>
        #paper {
            width: 500px;
            height: 400px;
            border: 1px solid #ccc;
        }
    </style>

    <div id="paper"></div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const graph = new joint.dia.Graph();

            const paper = new joint.dia.Paper({
                el: document.getElementById('paper'),
                model: graph,
                width: 500,
                height: 400,
                background: { color: '#F5F5F5' }
            });

            const rect1 = new joint.shapes.standard.Rectangle();
            rect1.position(50, 50);
            rect1.resize(180, 50);
            rect1.attr({
                body: {
                    fill: '#FFFFFF',
                    stroke: '#C94A46',
                    rx: 5,
                    ry: 5
                },
                label: {
                    text: 'Hello',
                    fill: '#353535'
                }
            });
            rect1.addTo(graph);

            const rect2 = new joint.shapes.standard.Rectangle();
            rect2.position(250, 150);
            rect2.resize(180, 50);
            rect2.attr({
                body: {
                    fill: '#FFFFFF',
                    stroke: '#C94A46',
                    rx: 5,
                    ry: 5
                },
                label: {
                    text: 'World!',
                    fill: '#353535'
                }
            });
            rect2.addTo(graph);
        });
    </script>
@endsection
