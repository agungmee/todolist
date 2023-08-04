<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List | Catatan Tugas Harian Kamu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <section class="input_modal">
        <div class="container" style="margin-top: 40px;">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Todolist</button>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add New Task</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="process/db_insert.php" method="POST">
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Task</label>
                                    <input name="task_name" type="text" class="form-control" id="recipient-name">
                                </div>
                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label">Description</label>
                                    <textarea name="task_description" class="form-control" id="message-text"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label">Deadline</label>
                                    <input type="date" name="task_deadline">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Add Task</button>
                            </form>
                        </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <section class="table_task">
        <div class="container" style="margin-top: 40px;">
            <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Task</th>
                <th scope="col">Description</th>
                <th scope="col">Deadline</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                <?php

                include('db/db_connect.php');

                // // For Edit Data
                // $id = $_GET['id'];
                // $query_update = "SELECT * FROM task WHERE id = '$id'";
                // $result = mysqli_query($connection, $query_update);
                // $row_update = mysqli_fetch_array($result);

                //For Read Data
                $no = 1;
                $query = mysqli_query($connection, "SELECT * FROM task");
                while($row = mysqli_fetch_array($query)) {

                ?>

                <tr>
                <th><?php echo $no++ ?></th>
                <td><?php echo $row['task_name'] ?></td>
                <td><?php echo $row['task_description'] ?></td>
                <td><?php echo $row['task_deadline'] ?></td>
                <td >
                    <span class="badge text-bg-primary" style="color: black;">Done</span>
                </td>
                <td>
                    <a href="" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#updateModal<?php echo $row['id']; ?>">Update Task</a>

                        <div class="modal fade" id="updateModal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add New Task</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="process/db_update.php" method="POST">
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Task</label>
                                        <input name="task_name" value="<?php echo $row['task_name'] ?>" type="text" class="form-control" id="recipient-name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="message-text" class="col-form-label">Description</label>
                                        <textarea name="task_description"class="form-control" id="message-text"><?php echo $row['task_description'] ?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="message-text" class="col-form-label">Deadline</label>
                                        <input type="date" name="task_deadline" value="<?php echo $row['task_deadline'] ?>">
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Task Done
                                        </label>
                                        </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Update Task</button>
                                </form>
                            </div>
                            </div>
                            </div>
                        </div>
                        </div>

                    <a href="" class="btn btn-sm btn-danger">Delete Task</a>
                </td>
                </tr>
                
                <?php } ?>

            </tbody>
            </table>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>