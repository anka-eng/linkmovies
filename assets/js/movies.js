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
    id: "1",
    title: "Sample Movie",
    year: "2024",
    thumb: "assets/img/poster.jpg",
    video: "<iframe src="https://streamtape.com/e/RXg7RQd2Kjud4AV/" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>",
    link: "movie.html?id=1",
    category: ["Action", "Drama"],
    description: "This is a demo movie for testing your website.",
    hd: true,
    latest: true
  }
];
