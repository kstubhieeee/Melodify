console.log("Welcome to Spotify");

let songIndex = 0;
let audioElement = new Audio("songs/1.mp3");
let masterPlay = document.getElementById("masterPlay");
let myProgressBar = document.getElementById("myProgressBar");
let gif = document.getElementById("gif");
let songItem = Array.from(document.getElementsByClassName("songItem"));
let masterSongName = document.getElementById("masterSongName");
let uploadSong = document.getElementById("uploadSong");
let uploadImage = document.getElementById("uploadImage");
let songNameInput = document.getElementById("songNameInput");
let addSongButton = document.getElementById("addSongButton");
let searchInput = document.getElementById("searchInput");
let searchButton = document.getElementById("searchButton");

let songs = [
  {
    songName: "Blinding Lights",
    filePath: "./songs/1.mp3",
    coverPath: "./songIMG/1.jpg",
  },
  {
    songName: "FE!N",
    filePath: "songs/2.mp3",
    coverPath: "./songIMG/2.jpg",
  },
  {
    songName: "Kun Faya Kun",
    filePath: "songs/3.mp3",
    coverPath: "./songIMG/3.jpg",
  },
  {
    songName: "Night Changes",
    filePath: "songs/4.mp3",
    coverPath: "./songIMG/4.jpg",
  },
  {
    songName: "Until I found you",
    filePath: "songs/5.mp3",
    coverPath: "./songIMG/5.jpg",
  },
  {
    songName: "Perfect",
    filePath: "songs/2.mp3",
    coverPath: "./songIMG/6.jpg",
  },
  {
    songName: "Shut up and dance",
    filePath: "songs/2.mp3",
    coverPath: "./songIMG/7.jpg",
  },
  {
    songName: "Into the Night",
    filePath: "songs/2.mp3",
    coverPath: "./songIMG/8.jpg",
  },
  {
    songName: "Cake by the ocean",
    filePath: "songs/2.mp3",
    coverPath: "./songIMG/9.jpg",
  },
  {
    songName: "Gimme Love",
    filePath: "songs/4.mp3",
    coverPath: "./songIMG/10.jpg",
  },
  {
    songName: "Sawar Loon",
    filePath: "songs/4.mp3",
    coverPath: "./songIMG/11.jpg",
  },
  {
    songName: "Jashn-E-Bahara",
    filePath: "songs/4.mp3",
    coverPath: "./songIMG/12.jpg",
  },
  {
    songName: "Pal Pal dilke pass",
    filePath: "songs/4.mp3",
    coverPath: "./songIMG/13.jpg",
  },
  {
    songName: "All the stars",
    filePath: "songs/4.mp3",
    coverPath: "./songIMG/14.jpg",
  },
  {
    songName: "The Night we met",
    filePath: "songs/4.mp3",
    coverPath: "./songIMG/15.jpg",
  },
  {
    songName: "Mast Magan",
    filePath: "songs/4.mp3",
    coverPath: "./songIMG/16.jpg",
  },
];

songItem.forEach((element, i) => {
  element.getElementsByTagName("img")[0].src = songs[i].coverPath;
  element.getElementsByClassName("songName")[0].innerText = songs[i].songName;
});

masterPlay.addEventListener("click", () => {
  if (audioElement.paused || audioElement.currentTime <= 0) {
    audioElement.play();
    masterPlay.classList.remove("fa-play-circle");
    masterPlay.classList.add("fa-pause-circle");
    gif.style.opacity = 1;
  } else {
    audioElement.pause();
    masterPlay.classList.remove("fa-pause-circle");
    masterPlay.classList.add("fa-play-circle");
    gif.style.opacity = 0;
  }
});

audioElement.addEventListener("timeupdate", () => {
  let prog = parseInt((audioElement.currentTime / audioElement.duration) * 100);
  myProgressBar.value = prog;
});

myProgressBar.addEventListener("change", () => {
  audioElement.currentTime =
    (myProgressBar.value * audioElement.duration) / 100;
});

const makeAllPlays = () => {
  Array.from(document.getElementsByClassName("songItemPlay")).forEach(
    (element) => {
      element.classList.remove("fa-pause-circle");
      element.classList.add("fa-play-circle");
    }
  );
};

Array.from(document.getElementsByClassName("songItemPlay")).forEach(
  (element) => {
    element.addEventListener("click", (e) => {
      makeAllPlays();
      songIndex = parseInt(e.target.id);
      e.target.classList.remove("fa-play-circle");
      e.target.classList.add("fa-pause-circle");
      audioElement.src = `songs/${songIndex + 1}.mp3`;
      masterSongName.innerText = songs[songIndex].songName;
      audioElement.currentTime = 0;
      audioElement.play();
      gif.style.opacity = 1;
      masterPlay.classList.remove("fa-play-circle");
      masterPlay.classList.add("fa-pause-circle");
    });
  }
);

document.getElementById("next").addEventListener("click", () => {
  if (songIndex >= songs.length - 1) {
    songIndex = 0;
  } else {
    songIndex += 1;
  }
  audioElement.src = `songs/${songIndex + 1}.mp3`;
  masterSongName.innerText = songs[songIndex].songName;
  audioElement.currentTime = 0;
  audioElement.play();
  masterPlay.classList.remove("fa-play-circle");
  masterPlay.classList.add("fa-pause-circle");
});

document.getElementById("previous").addEventListener("click", () => {
  if (songIndex <= 0) {
    songIndex = 0;
  } else {
    songIndex -= 1;
  }
  audioElement.src = `songs/${songIndex + 1}.mp3`;
  masterSongName.innerText = songs[songIndex].songName;
  audioElement.currentTime = 0;
  audioElement.play();
  masterPlay.classList.remove("fa-play-circle");
  masterPlay.classList.add("fa-pause-circle");
});

searchButton.addEventListener("click", () => {
  let query = searchInput.value.toLowerCase();
  let filteredSongs = songs.filter((song) =>
    song.songName.toLowerCase().includes(query)
  );

  if (filteredSongs.length > 0) {
    songItem.forEach((element, i) => {
      if (i < filteredSongs.length) {
        element.style.display = "flex";
        element.getElementsByTagName("img")[0].src = filteredSongs[i].coverPath;
        element.getElementsByClassName("songName")[0].innerText =
          filteredSongs[i].songName;
        element.getElementsByClassName("songItemPlay")[0].id = songs.indexOf(
          filteredSongs[i]
        );
      } else {
        element.style.display = "none";
      }
    });
  } else {
    songItem.forEach((element) => {
      element.style.display = "none";
    });
  }
});
