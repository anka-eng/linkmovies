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
    id: "warrior",
    title: "Warrior",
    year: "2024",
    thumb: "assets/img/warrior.webp",
    video: "https://www.youtube.com/embed/SeWDu1iLDJI",
    link: "movie.html?id=warrior",
    category: ["Action", "Drama", "Hindi Dubbed"],
    description: "Warrior",
    hd: true,
    latest: true
  }
];

