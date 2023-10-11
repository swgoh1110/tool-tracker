<table>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Description</th>
            <th>Statut</th>
            <th>Emprunté par</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($_['tools'] as $tool): ?>
            <tr>
                <td><?php echo $tool['name']; ?></td>
                <td><?php echo $tool['description']; ?></td>
                <td><?php echo $tool['status']; ?></td>
                <td><?php echo $tool['borrowed_by']; ?></td>
                <td>
                    <a href="/path/to/edit/route/<?php echo $tool['id']; ?>">Modifier</a>
                    <a href="/path/to/delete/confirmation/route/<?php echo $tool['id']; ?>">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
