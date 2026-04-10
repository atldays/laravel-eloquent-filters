# Contributing

Contributions are welcome.

Please read this guide before opening an issue or pull request.

## Before You Start

- Reproduce the bug first to make sure it is not incidental.
- Search existing issues and pull requests before opening a new one.
- Keep pull requests focused. One change per pull request is preferred.
- Update tests and documentation when behavior changes.

## Supported Stack

- PHP: `^8.1`
- Laravel components: `^10.0|^11.0|^12.0`
- Code style: Laravel Pint
- Tests: PHPUnit via Orchestra Testbench

## Development Notes

- Public APIs should remain stable unless the change is intentionally breaking and clearly documented.
- Keep changes framework-agnostic where possible.
- Prefer small, readable patches over broad refactors.

## Commit Messages

This repository uses Conventional Commits. The first line of the commit message must match this shape:

```text
<type>(optional-scope): <description>
```

Examples:

- `feat(filters): support single filter argument`
- `fix(ci): run tests on Laravel 12`
- `docs(readme): update installation instructions`

Allowed types:

- `build`
- `chore`
- `ci`
- `docs`
- `feat`
- `fix`
- `perf`
- `refactor`
- `revert`
- `style`
- `test`

## Local Checks

The repository ships with git hooks for:

- `pre-commit`: formats staged PHP files with Pint
- `pre-push`: runs the test suite

Without a local PHP installation, you can use Docker:

```bash
docker run --rm -v "$PWD:/app" -w /app composer:2 sh -lc 'composer format'
docker run --rm -v "$PWD:/app" -w /app composer:2 sh -lc 'composer test'
```

## Pull Requests

- Add tests for functional changes.
- Keep `README.md` and other docs in sync with behavior changes.
- Make sure `composer format:test` and `composer test` pass before requesting review.
- Use a clean, meaningful commit history.
