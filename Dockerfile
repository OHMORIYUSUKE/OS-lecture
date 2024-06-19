FROM python:3.9-alpine

WORKDIR /document

RUN pip install --upgrade pip && \
    pip install mkdocs mkdocs-material fontawesome_markdown

EXPOSE 8000

CMD ["mkdocs", "serve", "--dev-addr=0.0.0.0:8000"]
