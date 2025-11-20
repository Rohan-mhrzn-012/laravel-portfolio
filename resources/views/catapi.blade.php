<!DOCTYPE html>
<html>
<head>
  <title>Cat Voting</title>
</head>
<body>
  <button id="loadCats">Load Cats</button>
  <div id="cats"></div>

  <script>
    document.getElementById("loadCats").addEventListener("click", async () => {
      let res = await fetch("http://localhost:8000/api/cats/images");
      let cats = await res.json();
      let container = document.getElementById("cats");
      container.innerHTML = "";

      cats.forEach(cat => {
        let div = document.createElement("div");
        div.innerHTML = `
          <img src="${cat.url}" width="200"/>
          <button onclick="vote('${cat.id}', 1)">👍 Upvote</button>
          <button onclick="vote('${cat.id}', -1)">👎 Downvote</button>
        `;
        container.appendChild(div);
      });
    });

    async function vote(image_id, value) {
      let res = await fetch("http://localhost:8000/api/cats/vote", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
          image_id: image_id,
          value: value,
          sub_id: "user-123"
        })
      });
      let data = await res.json();
      console.log("Vote Response:", data);
    }
  </script>
</body>
</html>
