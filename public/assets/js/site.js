document.addEventListener("DOMContentLoaded", () => {
  const header = document.querySelector("[data-site-header]");

  if (header) {
    const updateHeaderState = () => {
      header.classList.toggle("is-scrolled", window.scrollY > 12);
    };

    updateHeaderState();
    window.addEventListener("scroll", updateHeaderState, { passive: true });
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

  const getHeaderOffset = () => {
    return (header?.getBoundingClientRect().height ?? 0) + 24;
  };

  const resolveActiveHash = () => {
    const headerOffset = getHeaderOffset();
    const sectionPositions = sections.map(({ hash, section }) => {
      return {
        hash,
        top: section.getBoundingClientRect().top
      };
    });

    const currentSection = sectionPositions
      .filter(({ top }) => top <= headerOffset)
      .sort((left, right) => right.top - left.top)[0];

    if (currentSection) {
      return currentSection.hash;
    }

    return sectionPositions.sort((left, right) => left.top - right.top)[0]?.hash ?? sections[0].hash;
  };

  const syncActiveLink = () => {
    setActiveLink(resolveActiveHash());
  };

  let isSyncQueued = false;

  const queueSyncActiveLink = () => {
    if (isSyncQueued) {
      return;
    }

    isSyncQueued = true;

    window.requestAnimationFrame(() => {
      isSyncQueued = false;
      syncActiveLink();
    });
  };

  if (window.location.hash) {
    const hashedSection = sections.find(({ hash }) => hash === window.location.hash);

    if (hashedSection) {
      setActiveLink(hashedSection.hash);
    }
  }

  queueSyncActiveLink();
  window.addEventListener("scroll", queueSyncActiveLink, { passive: true });
  window.addEventListener("resize", queueSyncActiveLink);
  window.addEventListener("hashchange", queueSyncActiveLink);
  window.addEventListener("load", queueSyncActiveLink);
});
