


  // Function to toggle between "Show More" and "Show Less"
function toggleText() {
    var dots = document.getElementById("dots");
    var moreText = document.getElementById("more");
    var btnText = document.getElementById("toggleBtn");

    if (dots.style.display === "none") {
        // If text is already expanded, hide extra text and reset the button
        dots.style.display = "inline";
        moreText.style.display = "none";
        btnText.innerHTML = "Show More";
    } else {
        // If text is collapsed, show extra text and change button
        dots.style.display = "none";
        moreText.style.display = "inline";
        btnText.innerHTML = "Show Less";
    }
}



// script.js
function submitComment() {
    // Get the input from the textarea
    const commentInput = document.getElementById("comment-input");
    const commentText = commentInput.value.trim();
  
    // If the comment is not empty, add it to the list
    if (commentText !== "") {
      // Create a new list item for the comment
      const newComment = document.createElement("li");
      newComment.textContent = commentText;
  
      // Add the new comment to the comments list
      const commentsList = document.getElementById("comments-list");
      commentsList.appendChild(newComment);
  
      // Clear the input field after submission
      commentInput.value = "";
    } else {
      alert("Please write a comment before submitting.");
    }
  }
  