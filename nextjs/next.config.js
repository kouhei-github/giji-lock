/** @type {import('next').NextConfig} */
const nextConfig = {
  reactStrictMode: true,
  swcMinify: true,
}

// next.config.js
const removeImports = require('next-remove-imports')();
module.exports = removeImports(nextConfig);
