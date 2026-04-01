document.addEventListener("DOMContentLoaded", () => {
  const header = document.querySelector("[data-site-header]");

  if (header) {
    const updateHeaderState = () => {
      header.classList.toggle("is-scrolled", window.scrollY > 12);
    };

    updateHeaderState();
    window.addEventListener("scroll", updateHeaderState, { passive: true });
  }

  if (!("IntersectionObserver" in window)) {
    return;
  }

  const links = Array.from(document.querySelectorAll("[data-nav-link]")).filter((link) => {
    return link.hash && link.pathname === window.location.pathname;
  });

  if (!links.length) {
    return;
  }

  const sections = links
    .map((link) => {
      const section = document.querySelector(link.hash);

      if (!section) {
        return null;
      }

      return {
        hash: link.hash,
        section
      };
    })
    .filter(Boolean);

  if (!sections.length) {
    return;
  }

  const setActiveLink = (hash) => {
    links.forEach((link) => {
      const isCurrent = link.hash === hash;

      link.classList.toggle("is-current", isCurrent);

      if (isCurrent) {
        link.setAttribute("aria-current", "location");
      } else if (link.getAttribute("aria-current") === "location") {
        link.removeAttribute("aria-current");
      }
    });
  };

  const observer = new IntersectionObserver(
    (entries) => {
      const visibleEntries = entries
        .filter((entry) => entry.isIntersecting)
        .sort((left, right) => right.intersectionRatio - left.intersectionRatio);

      if (!visibleEntries.length) {
        return;
      }

      const activeSection = sections.find(({ section }) => section === visibleEntries[0].target);

      if (activeSection) {
        setActiveLink(activeSection.hash);
      }
    },
    {
      rootMargin: "-35% 0px -45% 0px",
      threshold: [0.2, 0.4, 0.6]
    }
  );

  sections.forEach(({ section }) => {
    observer.observe(section);
  });
});
