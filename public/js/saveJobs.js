const like = document.querySelectorAll('.like');
console.log(like);

like.forEach( (like) =>{
  like.addEventListener('click', () => {
    let jobOfferId = like.getAttribute('name');
    console.log(jobOfferId);
    // POST通信
    fetch('/my-activity/saved-jobs', {
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
        // 'X-CSRF-TOKEN': document.head.attr('content'),
        "Content-Type": "application/json",
      },
      body: JSON.stringify({
        job_offer_id: jobOfferId,
      }),
    })
  .then((response) => response.json())
  .then((data) => {
    console.log(data)
  })
  .catch((error) => {
    console.log(error)
  });
  })
});