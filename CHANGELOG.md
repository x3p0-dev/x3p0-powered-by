# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com), and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [3.0.0] - 2026-02-23

### Added

- New `Block` interface for standardizing how blocks are output on the front end.
- New cornbread and potatoes superpower.

### Changed

- Minimum requirement of PHP 8.1+.
- Classes marked as `final` since they are not meant for extension.
- Hook callbacks use first-class callable syntax when a class method.
- Plugin bootstrap now happens on `plugins_loaded` with a `999999` priority instead of `PHP_INT_MAX`.
- The `Register` class renamed to `BlockRegistrar`.
- The `SuperPower` class has been moved to the `Support` subnamespace.

## [2.0.0] - 2025-09-23

### Added

- Two new plain text messages.
- Two new emoji messages.
- Block support for `shadow` and `anchor`.

### Changed

- The plugin was overhauled to use more modern PHP and block development JavaScript. This should not impact the block in any way.

## [1.0.0] - 2022-10-14

### Added

* Literally everything. This is version 1.0, after all.
