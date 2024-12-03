import $ from "jquery"

class Like {
  constructor() {
    this.events()
  }

  events() {
    $(".like-box").on("click", this.ourClickDispatcher.bind(this))
  }

  ourClickDispatcher(e) {
    var currentLikeBox = $(e.target).closest(".like-box")
    // console.log(currentLikeBox.data("professor"));

    if (currentLikeBox.data("exists") == "yes") {
      this.deleteLike(currentLikeBox)
    } else {
      this.createLike(currentLikeBox)
    }
  }

  createLike(currentLikeBox) {
    //  alert("create test message")
    $.ajax({
      beforeSend: (xhr) => {
        xhr.setRequestHeader("X-WP-Nonce", furniData.nonce);
      },
      url: furniData.root_url + "/wp-json/furni/v1/manageLike",
      type: "POST",
      data: { "professorId": currentLikeBox.data("professor") },
      success: response => {
        currentLikeBox.attr("data-exists", "yes")
        var likeCount = parseInt(currentLikeBox.find(".like-count").html(), 10)
        likeCount++
        currentLikeBox.find(".like-count").html(likeCount)
        currentLikeBox.attr("data-like", response)
        console.log(response)
      },
      error: response => {
        console.log(response)
      }
    })
  }

  deleteLike(currentLikeBox) {
    $.ajax({
      beforeSend: xhr => {
        xhr.setRequestHeader("X-WP-Nonce", furniData.nonce)
      },
      url: furniData.root_url + "/wp-json/furni/v1/manageLike",
      data: { "like": currentLikeBox.attr("data-like") },
      type: "DELETE",
      success: response => {
        currentLikeBox.attr("data-exists", "no")
        var likeCount = parseInt(currentLikeBox.find(".like-count").html(), 10)
        likeCount--
        currentLikeBox.find(".like-count").html(likeCount)
        currentLikeBox.attr("data-like", "")
        console.log(response)
      },
      error: response => {
        console.log(response)
      }
    })
  }
}

export default Like
