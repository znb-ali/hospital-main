 <!-- Specialization Filter -->
 <form method="GET" class="mb-4">
    <div class="form-group">
        <label for="specialization">Filter by Specialization</label>
        <select name="specialization" id="specialization" class="form-control">
            <option value="">All Specializations</option>
            <?php
            while ($specialization = mysqli_fetch_assoc($specialization_result)) {
                $selected = ($specialization['sp_id'] == $specialization_filter) ? 'selected' : '';
                echo "<option value='" . $specialization['sp_id'] . "' $selected>" . $specialization['sp_name'] . "</option>";
            }
            ?>
        </select>
    </div>
    <button type="submit" class="btn btn-outline-info mt-2">Filter</button>
</form>
