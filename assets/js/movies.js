/**
 * MOVIES DATA
 * Add your movies here following the format below.
 * 
 * Fields:
 * - id: Unique identifier (string)
 * - title: Movie title
 * - year: Release year
 * - thumb: URL to poster image (can be local: "assets/img/poster.jpg")
 * - video: URL to video file (can be local: "assets/vid/movie.mp4" or YouTube link)
 * - link: Always use "movie.html?id=YOUR_ID"
 * - category: Array of genres (e.g., ["Action", "Drama"])
 * - description: A short synopsis
 * - hd: true/false (displays HD badge)
 * - latest: true/false (displays in "Latest Releases" section)
 */

const moviesData = [
  {
    id: "pushpa-2",
    title: "Pushpa 2: The Rule",
    year: "2024",
    thumb: "assets/img/pushpa_2.jpg",
    video: "https://www.youtube.com/embed/1kVK0MZlbI4",
    link: "movie.html?id=pushpa-2",
    category: ["Action", "Drama", "Crime"],
    description: "As his smuggling empire grows, a brazen Pushpa longs for power and respect on his vengeful journey, while facing old rivals and new.",
    hd: true,
    latest: true
  },
  {
    id: "devara-1",
    title: "Devara: Part 1",
    year: "2024",
    thumb: "assets/img/devara.png",
    video: "https://www.youtube.com/embed/Lp9R4I6g6p0",
    link: "movie.html?id=devara-1",
    category: ["Action", "Drama"],
    description: "An epic action saga set against coastal lands, involving a man who stands against injustice in a gritty, high-stakes world.",
    hd: true,
    latest: true
  },
  {
    id: "guntur-kaaram",
    title: "Guntur Kaaram",
    year: "2024",
    thumb: "assets/img/guntur_kaaram.jpg",
    video: "https://www.youtube.com/embed/qYv9m6n7Z5Z",
    link: "movie.html?id=guntur-kaaram",
    category: ["Action", "Drama"],
    description: "A high-energy action drama set in the spicy fields of Guntur, featuring a man who fights for his family and honor.",
    hd: true,
    latest: true
  },
  {
    id: "bappam",
    title: "Bappam",
    year: "2024",
    thumb: "assets/img/bappam.png",
    video: "#",
    link: "movie.html?id=bappam",
    category: ["Drama"],
    description: "A compelling story that explores the deep emotional bonds and the struggles of a man in his quest for truth and peace.",
    hd: true,
    latest: true
  },
  {
    id: "eagle-2024",
    title: "Eagle",
    year: "2024",
    thumb: "assets/img/eagle.jpg",
    video: "https://www.youtube.com/embed/nZf9m6n7Z5Z",
    link: "movie.html?id=eagle-2024",
    category: ["Action", "Thriller"],
    description: "A mysterious assassin on a mission across the globe becomes the target of multiple intelligence agencies.",
    hd: true,
    latest: true
  },
  {
    id: "mercy-2025",
    title: "Mercy",
    year: "2025",
    thumb: "assets/img/mercy.jpg",
    video: "https://www.youtube.com/embed/8yY8m6n7Z5Z",
    link: "movie.html?id=mercy-2025",
    category: ["Action", "Sci-Fi", "Thriller"],
    description: "In a near future where capital crime is on the rise, a detective is accused of a crime he didn't commit and must prove his innocence.",
    hd: true,
    latest: true
  }
];
