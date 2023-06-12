    function openModal() {
        var modal = document.getElementById("modal");
        modal.style.display = "block";
    }

    // ページの読み込み完了時にモーダルを非表示にする
    document.addEventListener("DOMContentLoaded", function() {
        var modal = document.getElementById("modal");
        modal.style.display = "none";
    });



    function closeModal() {
        var modal = document.getElementById("modal");
        modal.style.display = "none";
    }

    function saveChanges() {
        var usernameInput = document.getElementById("edit-username");
        var bioInput = document.getElementById("edit-bio");
        var username = usernameInput.value;
        var bio = bioInput.value;


        // ここでユーザー名と自己紹介文を保存する処理を追加する

        var usernameDisplay = document.getElementById("username");
        var bioDisplay = document.getElementById("bio");

        usernameDisplay.innerText = username;
        bioDisplay.innerText = bio;

        closeModal();
    }