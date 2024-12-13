@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Templates</h1>
    <div class="row">
        @foreach($templates as $template)
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $template->nome }}</h5>
                    <button class="btn btn-primary" onclick="showPreview({{ $template->id }})">
                        Visualizar
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="templatePreviewModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Visualizar Template</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="template-preview">
                    <!-- Aqui o preview será carregado dinamicamente -->
                </div>
                <p id="template-description">
                    <!-- Aqui a descrição será carregada -->
                </p>
            </div>
            <div class="modal-footer">
                <a id="use-template-btn" href="#" class="btn btn-success">Usar Modelo</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<script>
    function showPreview(templateId) {
        // Fazer uma requisição Ajax para obter os dados do template
        fetch(`/templates/${templateId}`)
            .then(response => response.json())
            .then(data => {
                // Atualizar o conteúdo do modal
                document.getElementById('template-preview').innerHTML = data.preview;
                document.getElementById('template-description').textContent = data.descricao;
                document.getElementById('use-template-btn').href = `/diagramas/create?template=${templateId}`;
                // Abrir o modal
                $('#templatePreviewModal').modal('show');
            });
    }
</script>
@endsection
