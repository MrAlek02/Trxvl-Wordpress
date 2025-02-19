import { setActiveClassToItemFromArray } from '../utils/html';

class FetchPosts {
  private container: HTMLElement;
  private page: number;
  private postsContainer: HTMLElement;
  private btn: HTMLElement;
  private filterLinks: NodeListOf<HTMLLinkElement>;
  private options: any;

  constructor(container: HTMLDivElement) {
    this.container = container;
    this.postsContainer = this.container.querySelector('.js-posts');
    this.btn = this.container.querySelector('.js-load-more-btn');
    this.filterLinks = this.container.querySelectorAll('.js-filter-link');

    this.options = JSON.parse(this.postsContainer.getAttribute('data-options'));

    this.page = 1;

    this.handleButtonClick();
    this.handleFilterClick();
    this.handlePopstate();
  }

  handleButtonClick() {
    this.btn.addEventListener('click', () => {
      this.loadPosts(false);
    });
  }

  handleFilterClick() {
    if (this.options.useAjaxForFilters === 'do-not-use') return;
    this.filterLinks.forEach((link: HTMLElement, linkIndex: number) => {
      link.addEventListener('click', (e) => {
        e.preventDefault();
        this.options.currentCategory =
          link.getAttribute('data-category') || null;
        this.options.currentTaxonomy =
          link.getAttribute('data-taxonomy') || null;
        this.page = 0;
        this.loadPosts(true);
        setActiveClassToItemFromArray(this.filterLinks, linkIndex);

        const url = link.getAttribute('href');
        window.history.pushState({}, '', decodeURIComponent(url));
      });
    });
  }

  handlePopstate(): void {
    window.addEventListener(
      'popstate',
      (e: any) => {
        location.href = e.currentTarget.location.href;
      },
      false
    );
  }

  setLoadingStatus(status: boolean): void {
    if (status) this.container.classList.add('loading');
    if (!status) this.container.classList.remove('loading');
  }

  handleResponse(data: { posts: string; lastPage: boolean }, replace: boolean) {
    if (replace) this.postsContainer.innerHTML = data.posts;
    if (!replace)
      this.postsContainer.insertAdjacentHTML('beforeend', data.posts);

    if (data.lastPage) this.btn.classList.add('hide');
    if (!data.lastPage) this.btn.classList.remove('hide');
  }

  createFormData(replace: boolean) {
    const form: any = new FormData();

    form.append('page', this.page);
    form.append('postType', this.options.postType);
    form.append('postTemplateName', this.options.postTemplateName);
    form.append('initialNumberOfPosts', this.options.initialNumberOfPosts);

    if (replace) form.append('replace', replace);
    if (this.options.currentCategory)
      form.append('category', this.options.currentCategory);
    if (this.options.currentTaxonomy)
      form.append('taxonomy', this.options.currentTaxonomy);

    const numberOfPosts = replace
      ? this.options.initialNumberOfPosts
      : this.options.numberOfPostsPerLoadMore;
    form.append('numberOfPosts', numberOfPosts);

    return form;
  }

  loadPosts(replace: boolean): void {
    this.page++;
    this.setLoadingStatus(true);

    const form = this.createFormData(replace);

    fetch(
      `${window.globals.ajax_url}?action=${this.options.actionName}&security=custom_nonce`,
      {
        method: 'POST',
        credentials: 'same-origin',
        body: form
      }
    )
      .then((res) => res.json())
      .then((data) => {
        this.setLoadingStatus(false);
        this.handleResponse(data, replace);
      })
      .catch((err) => {
        console.log(err);
        this.setLoadingStatus(false);
      });
  }
}

const fetchPosts = () => {
  const postsContainer = document.querySelectorAll(
    '.js-posts-container'
  )! as NodeListOf<HTMLDivElement>;

  postsContainer.forEach((container) => new FetchPosts(container));
};

export default fetchPosts;
