        <section class="container users-list">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3>Lista de usuários</h3>
                    <a href="#" class="btn btn-sm btn-success float-right" data-toggle="tooltip" title="Adicionar Novo"><i class="fas fa-plus"></i></a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">E-Mail</th>
                                <th scope="col">Emissão</th>
                                <th scope="col">Data Emissão</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($users as $user): ?>
                                <tr>
                                    <td scope="row"><?=$user->id?></td>
                                    <td><?=$user->nome?></td>
                                    <td><?=$user->email?></td>
                                    <td><?=$user->emissao?></td>
                                    <td><?=$user->data_emissao?></td>
                                    <td>
                                        <div class="btn-group">
                                            <a class="btn btn-sm btn-light" data-toggle="tooltip" alt="Editar" title="Editar"><i class="fas fa-edit"></i></a>
                                            <a class="btn btn-sm btn-light" data-toggle="tooltip" alt="Excluir" title="Excluir"><i class="fas fa-times"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <nav>
                        <ul class="pagination pagination-sm">
                            <?php foreach(range(1, $maxPages) as $page): ?>
                                <li class="page-item">
                                    <a href="?page=<?=$page?>" class="page-link"><?=$page?></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </section>